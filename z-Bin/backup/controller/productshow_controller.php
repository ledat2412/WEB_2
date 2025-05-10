<?php
require_once '../model/product.php';
require_once '../model/product_variant.php';
require_once '../model/colors.php';
require_once '../model/sex.php';
// Sử dụng model materials thay vì material
require_once '../model/materials.php';

$product = new Product();
$products = $product->getAllProducts();

$variantModel = new ProductVariant();
$variants = $variantModel->getAllVariants();

$colorModel = new Colors();
$colors = $colorModel->getAllColors();

$sexModel = new Sex();
$sexes = $sexModel->getAllSex();

// Thay vì Material, dùng Materials
$materialModel = new Materials();
$materials = $materialModel->getAllMaterials();

// Xử lý filter từ form
$filter_variant = $_GET['variant'] ?? '';
$filter_color = $_GET['color'] ?? '';
$filter_price = $_GET['price'] ?? '';
$filter_sex = $_GET['sex'] ?? '';
$filter_material = $_GET['material'] ?? '';
$filter_price_min = isset($_GET['price_min']) && $_GET['price_min'] !== '' ? intval(str_replace('.', '', $_GET['price_min'])) : null;
$filter_price_max = isset($_GET['price_max']) && $_GET['price_max'] !== '' ? intval(str_replace('.', '', $_GET['price_max'])) : null;

// Lọc sản phẩm
$filtered_products = [];
$displayed_products = [];
foreach ($products as $item) {
    // Sửa điều kiện lọc variant: chỉ lọc nếu $filter_variant khác rỗng
    if ($filter_variant !== '' && $item['id_product_variant'] != $filter_variant) continue;
    if ($filter_color && $item['color_id'] != $filter_color) continue;
    if ($filter_sex && $item['sex_id'] != $filter_sex) continue;
    if ($filter_material && $item['material_id'] != $filter_material) continue;
    // Lọc theo khoảng giá nhập tay (chỉ lọc nếu min hoặc max khác null)
    if ($filter_price_min !== null && $filter_price_max !== null) {
        if ($item['price'] < $filter_price_min || $item['price'] > $filter_price_max) continue;
    } elseif ($filter_price_min !== null) {
        if ($item['price'] < $filter_price_min) continue;
    } elseif ($filter_price_max !== null) {
        if ($item['price'] > $filter_price_max) continue;
    }
    // Nếu vẫn muốn giữ radio preset, giữ lại đoạn này
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

// Đếm số sản phẩm không trùng nhau sau khi filter
$filtered_unique_shoe_codes = [];
foreach ($filtered_products as $item) {
    if (!in_array($item['shoe_code'], $filtered_unique_shoe_codes)) {
        $filtered_unique_shoe_codes[] = $item['shoe_code'];
    }
}

require '../view/product/productshow_view.php';
