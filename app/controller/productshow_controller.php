<?php
require_once '../model/product.php';
require_once '../model/product_variant.php';
require_once '../model/colors.php';
require_once '../model/sex.php';

$product = new Product();
$products = $product->getAllProducts();

$variantModel = new ProductVariant();
$variants = $variantModel->getAllVariants();

$colorModel = new Colors();
$colors = $colorModel->getAllColors();

$sexModel = new Sex();
$sexes = $sexModel->getAllSex();

// Xử lý filter từ form
$filter_variant = $_GET['variant'] ?? '';
$filter_color = $_GET['color'] ?? '';
$filter_price = $_GET['price'] ?? '';
$filter_sex = $_GET['sex'] ?? '';

// Lọc sản phẩm
$filtered_products = [];
$displayed_products = [];
foreach ($products as $item) {
    if ($filter_variant && $item['id_product_variant'] != $filter_variant) continue;
    if ($filter_color && $item['color_id'] != $filter_color) continue;
    if ($filter_sex && $item['sex_id'] != $filter_sex) continue;
    if ($filter_price) {
        if ($filter_price == '1' && $item['price'] >= 1000000) continue;
        if ($filter_price == '2' && ($item['price'] < 1000000 || $item['price'] > 2000000)) continue;
        if ($filter_price == '3' && $item['price'] <= 2000000) continue;
    }
    if (!in_array($item['shoe_code'], $displayed_products)) {
        $displayed_products[] = $item['shoe_code'];
        $filtered_products[] = $item;
    }
}

// Đếm số sản phẩm không trùng nhau
$unique_shoe_codes = [];
foreach ($products as $item) {
    if (!in_array($item['shoe_code'], $unique_shoe_codes)) {
        $unique_shoe_codes[] = $item['shoe_code'];
    }
}

require '../view/product/productshow_view.php';
