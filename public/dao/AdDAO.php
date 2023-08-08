<?php
require_once __DIR__ . "/../models/Ad.php";
require_once __DIR__ . "/../models/Cep.php";
class AdDAO
{
  private $conn;
  public function __construct(PDO $conn)
  {
    $this->conn = $conn;
  }
  public function createAd(Ad $Ad)
  {
    $title = $Ad->title;
    $description = $Ad->description;
    $image = $Ad->image;
    $cep = $Ad->cep;
    $num = $Ad->num;
    $category = $Ad->category;
    $price = $Ad->price;

    $stmt = $this->conn->prepare("INSERT INTO products 
    (title, description, image, cep, num, category, price) 
    VALUES 
    (:title, :description, :image, :cep, :num, :category, :price)
    ");

    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":cep", $cep);
    $stmt->bindParam(":num", $num);
    $stmt->bindParam(":category", $category);
    $stmt->bindParam(":price", $price);

    $stmt->execute();

  }

  public function findProducts()
  {
    $stmt = $this->conn->prepare("SELECT * FROM products");
    $stmt->execute();

    $Ads = [];

    $AdsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($AdsArray as $ad) {
      $Ad = new Ad;
      $Ad->productId = $ad["product_id"];
      $Ad->title = $ad["title"];
      $Ad->description = $ad["description"];
      $Ad->image = $ad["image"];
      $Ad->cep = $ad["cep"];
      $Ad->num = $ad["num"];
      $Ad->category = $ad["category"];
      $Ad->price = $ad["price"];

      $Ads[] = $Ad;
    }

    return $Ads;
  }
  public function findProduct($productId)
  {
    $stmt = $this->conn->prepare("SELECT * FROM products WHERE product_id = :product_id");
    $stmt->bindParam(":product_id", $productId);
    $stmt->execute();

    $adArray = $stmt->fetch(PDO::FETCH_ASSOC);

    $Ad = new Ad;
    $Ad->title = $adArray["title"];
    $Ad->description = $adArray["description"];
    $Ad->image = $adArray["image"];
    $Ad->cep = $adArray["cep"];
    $Ad->num = $adArray["num"];
    $Ad->category = $adArray["category"];
    $Ad->price = $adArray["price"];

    return $Ad;
  }
  function findCep($productId)
  {
    $stmt = $this->conn->prepare("SELECT * FROM ceps WHERE product_id = :product_id");
    $stmt->bindParam(":product_id", $productId);
    $stmt->execute();

    $cepArray = $stmt->fetch(PDO::FETCH_ASSOC);

    $Cep = new Cep;
    $Cep->cepId = $cepArray["cep_id"];
    $Cep->cidade = $cepArray["cidade"];
    $Cep->bairro = $cepArray["bairro"];
    $Cep->logradouro = $cepArray["logradouro"];
    return $Cep;
  }
}