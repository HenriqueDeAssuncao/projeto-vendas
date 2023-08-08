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

    $i = 0;

    foreach ($images as $array => $value) {
      $Image = new Image;
      $ImageDao = new ImageDAO($conn);

      $image = [];

      $image["name"] = $array["name"][$i];
      $image["full_path"] = $array["full_path"][$i];
      $image["tmp_name"] = $array["tmp_name"][$i];
      $image["error"] = $array["error"][$i];
      $image["size"] = $array["size"][$i];

      print_r($image);
      echo "<br>";

      return;

      $path = $Ad->verifyImg($image);
      $Ad->uploadImg($image, $path);



      $Image->image = $path;
      $productId = $ImageDao->findProductId($Ad->token);
      $Image->productId = $productId;

      $ImageDao->createImage($Image);

      $i++;
    }

    header("location: /ads");

  } else {
    die("Todos os campos são obrigatórios.");
  }
} else {
  die("Todos os campos são obrigatórios.");
}