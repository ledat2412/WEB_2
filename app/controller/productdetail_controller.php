<?php
require_once __DIR__ . '/../model/product.php';

$product_id = $_GET['id'] ?? null;
$product = new Product();
$product_detail = $product_id ? $product->getProduct($product_id) : null;

$image_urls = [];
if ($product_detail) {
    $item = $product_detail[0];
    $image_dir = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/" .
        str_replace("../../../public/assets/img/Sản Phẩm/", "", $item['picture_path']);
    $absolute_dir = realpath($image_dir);

    $images = [];
    if ($absolute_dir) {
        $webp_images = glob($absolute_dir . '/*.webp') ?: [];
        $jpg_images = glob($absolute_dir . '/*.jpg') ?: [];
        $jpeg_images = glob($absolute_dir . '/*.jpeg') ?: [];
        $png_images = glob($absolute_dir . '/*.png') ?: [];
        $images = array_merge($webp_images, $jpg_images, $jpeg_images, $png_images);
    }
    foreach ($images as $image) {
        $url_path = str_replace('\\', '/', $image);
        $url_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $url_path);
        $image_urls[] = $url_path;
    }
}

require __DIR__ . '/../view/product/product_detail_view.php';
