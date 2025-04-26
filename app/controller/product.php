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

// ------------------------------------------------------------------------------
    public function handlescanproduct() {
        $product = new Product();
        $products = $product->getAllProducts();
        
        echo "<h3>Debug Information:</h3>";
        echo "Số lượng sản phẩm: " . count($products) . "<br>";
        echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
        
        if (empty($products)) {
            echo "Không có sản phẩm nào được tìm thấy.<br>";
        } else {
            echo "<h4>Thông tin sản phẩm đầu tiên:</h4>";
            echo "<pre>";
            print_r($products[0]);
            echo "</pre>";
        }
    }

    public function productContainer() {
        $products = $this->productModel->getAllProducts();
        $uniqueProducts = [];
        $displayedShoeCodes = [];
        foreach ($products as $item) {
            if (!in_array($item['shoe_code'], $displayedShoeCodes)) {
                $displayedShoeCodes[] = $item['shoe_code'];
                $uniqueProducts[] = $item;
            }
        }
        return $uniqueProducts;
    }

    public function apiGetAllProducts() {
        header('Content-Type: application/json');
        echo json_encode([
            ['product_name' => 'Test Product', 'price' => 123000],
            ['product_name' => 'Another Product', 'price' => 456000]
        ]);
        exit;
    }
}


