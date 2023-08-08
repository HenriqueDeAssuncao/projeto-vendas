<?php
require_once __DIR__ . "/../models/Image.php";

class ImageDAO
{
  private $conn;
  public function __construct(PDO $conn)
  {
    $this->conn = $conn;
  }
  public function findImages($productId)
  {
    $stmt = $this->conn->prepare("SELECT * FROM images WHERE product_id = :product_id");
    $stmt->bindParam(":product_id", $productId);
    $stmt->execute();

    $images = [];

    $imagesArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($imagesArray as $image) {
      $Image = new Image;
      $Image->imageId = $image["image_id"];
      $Image->productId = $image["product_id"];
      $Image->image = $image["image"];

      $images[] = $Image;
    }

    return $images;
  }
  public function findProductId($token)
  {
    $stmt = $this->conn->prepare("SELECT product_id FROM products WHERE token = :token");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $productId = $stmt->fetch();
    return $productId[0];
  }
  public function createImage(Image $Image)
  {
    $productId = $Image->productId;
    $image = $Image->image;

    $stmt = $this->conn->prepare("INSERT INTO images 
    (product_id, image) 
    VALUES 
    (:product_id, :image)
    ");

    $stmt->bindParam(":product_id", $productId);
    $stmt->bindParam(":image", $image);
    $stmt->execute();
  }
}