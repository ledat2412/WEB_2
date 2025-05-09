<?php
session_start();   
require_once __DIR__ . '/../model/product.php';
require_once __DIR__ . '/../model/product_variant.php';
require_once __DIR__ . '/../model/colors.php';
require_once __DIR__ . '/../model/sex.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function listProducts() {
        $products = $this->productModel->showproduct();
        return $products;
    }

    public function details(){
        if(isset($_GET['id_product'])) {
            $id_product = $_GET['id_product'];
            $product = $this->productModel->getProduct($id_product);
            return $product;
        }
    }
    public function handleDeleteProduct() {
        if(isset($_POST['deleteProduct'])) {
            $id_product = $_POST['id_product'];
            $this->productModel->deleteProduct($id_product);
        }
        header("Location: ../view/admin/product.php?success=deleteProduct");
    }

    public function handleAddProduct() {
        if(isset($_POST['addProduct'])) {
            $size = $_POST['size'];
            $picture_path = $_POST['picture_path'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $color_id = $_POST['color_id'];
            $material_id = $_POST['material_id'];
            $sex_id = $_POST['sex_id'];
            $id_product_variant = $_POST['id_product_variant'];
            $description_id = $_POST['description_id'];
            $this->productModel->addProduct($size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id);
        }
        header("Location: ../view/admin/product.php?success=addProduct");
    }
    public function product_detail(){
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
                $webp_images = glob($absolute_dir . "/*.webp") ?: [];
                $jpg_images = glob($absolute_dir . "/*.jpg") ?: [];
                $jpeg_images = glob($absolute_dir . "/*.jpeg") ?: [];
                $png_images = glob($absolute_dir . "/*.png") ?: [];
                $images = array_merge($webp_images, $jpg_images, $jpeg_images, $png_images);
            }
            foreach ($images as $image) {
                $url_path = str_replace('\\', '/', $image);
                $url_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $url_path);
                $image_urls[] = $url_path;
            }
        }

        require '../../view/product/product_detail.php';
    }
}


