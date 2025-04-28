<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Truoc require<br>";
require_once '../controller/product.php';
echo "Sau require<br>";
$controller = new ProductController();
echo "Sau khoi tao controller<br>";
$controller->apiGetAllProducts();
