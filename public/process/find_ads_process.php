<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../dao/AdDAO.php";
require_once __DIR__ . "/../models/Ad.php";

$AdDao = new AdDAO($conn);

$ads = $AdDao->findProducts();