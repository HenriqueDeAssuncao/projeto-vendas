<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../dao/AdDAO.php";
require_once __DIR__ . "/../models/Ad.php";

if (!empty($_POST)) {

  $title = $_POST["title"];
  $image = $_FILES["image"];
  $cep = $_POST["cep"];
  $num = $_POST["num"];
  $price = $_POST["price"];
  $category = $_POST["category"];
  $description = $_POST["description"];

  if ($title && $image && $cep && $num && $price && $category && $description) {
    $Ad = new Ad;
    $AdDao = new AdDAO($conn);

    //Verificar imagem

    $path = $Ad->verifyImg($image);
    $Ad->uploadImg($image, $path);

    $Ad->title = $title;
    $Ad->image = $path;
    $Ad->cep = $cep;
    $Ad->num = $num;
    $Ad->price = $price;
    $Ad->category = $category;
    $Ad->description = $description;

    $AdDao->createAd($Ad);

  } else {
    die("Todos os campos são obrigatórios.");
  }
} else {
  die("Todos os campos são obrigatórios.");
}