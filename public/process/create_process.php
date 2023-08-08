<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../dao/AdDAO.php";
require_once __DIR__ . "/../models/Ad.php";
require_once __DIR__ . "/../models/Image.php";
require_once __DIR__ . "/../dao/ImageDAO.php";

if (!empty($_POST)) {

  $title = $_POST["title"];
  $images = $_FILES["images"];
  $cep = $_POST["cep"];
  $num = $_POST["num"];
  $price = $_POST["price"];
  $category = $_POST["category"];
  $description = $_POST["description"];

  if ($title && $images && $cep && $num && $price && $category && $description) {

    $Ad = new Ad;
    $AdDao = new AdDAO($conn);

    $Ad->setToken();
    $Ad->title = $title;
    $Ad->cep = $cep;
    $Ad->num = $num;
    $Ad->price = $price;
    $Ad->category = $category;
    $Ad->description = $description;

    $AdDao->createAd($Ad);

    //Cadastrar imagens

    $imgNum = count($images["name"]);

    for ($i = 0; $i < $imgNum; $i++) {
      $image = [];
      $image["name"] = $images["name"][$i];
      $image["full_path"] = $images["full_path"][$i];
      $image["tmp_name"] = $images["tmp_name"][$i];
      $image["error"] = $images["error"][$i];
      $image["size"] = $images["size"][$i];
      //print_r($image);
      //echo "<br>";

      //Cadastro a imagem
      $path = $Ad->verifyImg($image);
      $Ad->uploadImg($image, $path);

      $Image = new Image;
      $ImageDao = new ImageDAO($conn);

      $Image->productId = $ImageDao->findProductId($Ad->token);
      $Image->image = $path;

      $ImageDao->createImage($Image);
    }

    header("location: /ads");

  } else {
    die("Todos os campos são obrigatórios.");
  }
} else {
  die("Todos os campos são obrigatórios.");
}