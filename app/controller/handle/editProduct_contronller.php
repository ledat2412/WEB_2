<?php 
    include_once "../../../app/model/handle/editProduct.php";
    include_once "../../../app/model/database.php";

    $editProductModel = new editProduct();

    // Lấy danh sách giới tính, màu sắc, vật liệu
    $sexList = $editProductModel->getSexList();
    $colorList = $editProductModel->getColorList();
    $materialList = $editProductModel->getMaterialList();

    if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
        $id = $_GET['product_id'];
        $DataProduct = $editProductModel->getProduct($id);
        if (is_array($DataProduct) && count($DataProduct) > 0) {
            $product = $DataProduct[0];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST["btn_repair"])) {
                    $nameNew = $_POST["nameNew"];
                    $variantNew = trim($_POST["variantNew"]);
                    $stockNew = $_POST["stockNew"];
                    $priceNew = $_POST["priceNew"];
                    $sexNew = $_POST["sexNew"];
                    $colorNew = $_POST["colorNew"];
                    $descriptionNew = $_POST["descriptionNew"];
                    $materialNew = trim($_POST["materialNew"]);
                    $description_id = $product['description_id'];
                    $material_id = $product['material_id'];
                    $color_id = $product['color_id'];
                    $variant_id = $product['product_variant_id'];
                    $sex_id = $product['sex_id'];
                     // Xử lý ảnh
                    if (!empty($_FILES["pictureNew"]["name"])) {
                        $pictureNew = $_FILES["pictureNew"]["name"];
                        $target_dir = "../../../public/img/";
                        $target_file = $target_dir . basename($pictureNew);
                        move_uploaded_file($_FILES["pictureNew"]["tmp_name"], $target_file);
                    } else {
                        $pictureNew = $product['picture_path']; // giữ ảnh cũ nếu không upload mới
                    }
                    if ($nameNew != $product['product_name'] || $variantNew != $product['product_variant_name'] || $stockNew != $product['stock'] || $priceNew != $product['price'] || $pictureNew != $product['picture_path'] || $materialNew != $product['material_name'] || $descriptionNew != $product['description_content'] || $sexNew != $product['sex_name'] || $colorNew != $product['color_name']) {
                        $editProductModel->updateProduct($descriptionNew, $description_id, $materialNew, $material_id, $sexNew, $sex_id, $colorNew, $color_id, $variantNew, $variant_id, $nameNew, $stockNew, $priceNew, $pictureNew, $id);
                        header("location: listProduct_contronller.php");
                        exit();
                    }
                }
            } 
            include "../../view/html/SuaSanPham.php";
        }
        else {
            die("Không tìm thấy sản phẩm hoặc lỗi truy vấn.");
        }
    }
    else {
        die("Không nhận được ID sản phẩm.");
    } 
?>