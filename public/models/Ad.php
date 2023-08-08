<?php
class Ad
{
  public $productId;
  public $title;
  public $description;
  public $image;
  public $cep;
  public $num;
  public $category;
  public $price;
  public function verifyImg($image)
  {
    if ($image['error']) {
      die("Falha ao enviar a imagem.");
    }

    $imgName = $image['name'];
    $newImgName = uniqid();

    $imgType = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

    if ($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg") {
      die("Tipo de arquivo inválido!");
    } else {
      $path = "/img/system/" . $newImgName . "." . $imgType;
      return $path;
    }
  }

  function uploadImg($image, $path)
  {
    $pathString = "../" . $path;
    $moveFile = move_uploaded_file($image["tmp_name"], $pathString);
    return $moveFile;
  }
}