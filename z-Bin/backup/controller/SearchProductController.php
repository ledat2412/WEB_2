<?php
require_once __DIR__ . '/../model/product.php'; // Đúng tên file model

// Để test layout search mà không cần router:
$productModel = new Product();
$allProducts = $productModel->getAllProducts();

// Lọc sản phẩm không trùng nhau theo product_name và shoe_code
$uniqueProducts = [];
$seen = [];
foreach ($allProducts as $product) {
    $key = $product['product_name'] . '|' . $product['shoe_code'];
    if (!isset($seen[$key])) {
        $uniqueProducts[] = $product;
        $seen[$key] = true;
    }
}
$products = $uniqueProducts;

include __DIR__ . '/../view/search/search_product.php';
