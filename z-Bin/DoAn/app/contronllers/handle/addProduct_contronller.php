<?php 
    include_once "../../models/handle/addProduct.php";
    include_once "../../models/tables/database.php";

    $addProductModel = new addProduct();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST["btn"])) {
            $product_name = $_POST["product_name"];
            $product_price = $_POST["product_price"];
            $product_description = $_POST["product_description"];
            if (!empty($_FILES["product_img"]["name"])) {
                $product_image = $_FILES["product_img"]["name"];
                $target_dir = "../../../public/img/";
                $target_file = $target_dir . basename($product_image);
                move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file);      
            } else {
                $product_image = ""; // hoặc xử lý ảnh mặc định
            }

            $product_color = $_POST["color"];
            $product_code = $_POST["product_code"];
            $product_quantity = $_POST["product_quantity"];
            $product_material = $_POST["product_material"];
            $product_sex = $_POST["sex"];
            $product_variant = $_POST["product_variant"];

            $addProductModel->addProduct($product_name, $product_image, $product_quantity, $product_price, $product_description, $product_color, $product_material, $product_sex, $product_variant);
            header("Location: listProduct_contronller.php");
            exit();
        }
    }
    include_once "../../views/html/ThemSanPhamMoi.php";
?>