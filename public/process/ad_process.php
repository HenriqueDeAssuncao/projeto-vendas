<?php
require_once "helpers/db.php";
require_once "dao/AdDAO.php";
require_once "models/Image.php";
require_once "dao/ImageDAO.php";

//Carrega o anúncio
$id = $_GET["id"];
$AdDao = new AdDAO($conn);
$Ad = $AdDao->findProduct($id);

//Carrega as imagens
$ImageDao = new ImageDAO($conn);
$images = $ImageDao->findImages($id);

