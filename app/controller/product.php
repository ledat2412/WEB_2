<?php
session_start();   
require_once '../model/product.php';

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
}


