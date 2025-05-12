<?php 
    include_once "../../../app/model/handle/editProduct.php";
    include_once "../../../app/model/database.php";

    $editProductModel = new editProduct();

    // Lấy danh sách giới tính, màu sắc, vật liệu
    $sexList = $editProductModel->getSexList();
    $colorList = $editProductModel->getColorList();
    $materialList = $editProductModel->getMaterialList();
    $variantList = $editProductModel->getVariantList();

    if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
        $id = $_GET['product_id'];
        $DataProduct = $editProductModel->getProduct($id);
        if (is_array($DataProduct) && count($DataProduct) > 0) {
            $product = $DataProduct[0];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST["btn_repair"])) {
                    $nameNew = isset($_POST["nameNew"]) ? $_POST["nameNew"] : '';
                    $variantNew = isset($_POST["variantNew"]) ? $_POST["variantNew"] : '';
                    $stockNew = isset($_POST["stockNew"]) ? $_POST["stockNew"] : '';
                    $priceNew = isset($_POST["priceNew"]) ? $_POST["priceNew"] : '';
                    $sexNew = isset($_POST["sexNew"]) ? $_POST["sexNew"] : '';
                    $colorNew = isset($_POST["colorNew"]) ? $_POST["colorNew"] : '';
                    $descriptionNew = isset($_POST["descriptionNew"]) ? $_POST["descriptionNew"] : '';
                    $materialNew = isset($_POST["materialNew"]) ? $_POST["materialNew"] : '';
                    $description_id = $product['description_id'];
                    $material_id = $product['material_id'];
                    $color_id = $product['color_id'];
                    $variant_id = $product['product_variant_id'];
                    $sex_id = $product['sex_id'];
                     // Xử lý ảnh
                    if (!empty($_FILES["pictureNew"]["name"])) {
                        $product_variant = $_POST["variantNew"];
                        $product_code = $product['product_id']; // hoặc mã sản phẩm riêng nếu có
                        $base_dir = "../../../public/assets/img/Sản Phẩm/";
                        $variant_folder = trim($product_variant);
                        if ($variant_folder == '') $variant_folder = 'Khac';
                        $main_variant_dir = $base_dir . $variant_folder . '/';
                        if (!is_dir($main_variant_dir)) {
                            mkdir($main_variant_dir, 0777, true);
                        }
                        $sub_folder = trim($product_code);
                        $sub_folder = preg_replace('/[^\w\-]/u', '', $sub_folder);
                        if ($sub_folder == '') $sub_folder = 'SanPhamMoi';
                        $target_dir = $main_variant_dir . $sub_folder . '/';
                        if (!is_dir($target_dir)) {
                            mkdir($target_dir, 0777, true);
                        }
                        $product_image = $_FILES["pictureNew"]["name"];
                        $target_file = $target_dir . basename($product_image);
                        move_uploaded_file($_FILES["pictureNew"]["tmp_name"], $target_file);
                        $pictureNew = $target_dir; // Lưu đường dẫn thư mục vào DB
                    } else {
                        $pictureNew = $product['picture_path']; // giữ ảnh cũ nếu không upload mới
                    }
                    if (
                        $nameNew != $product['product_name'] ||
                        $variantNew != $product['product_variant_name'] ||
                        $stockNew != $product['stock'] ||
                        $priceNew != $product['price'] ||
                        $pictureNew != $product['picture_path'] ||
                        $materialNew != $product['material_id'] ||
                        $descriptionNew != $product['description_content'] ||
                        $sexNew != $product['sex_id'] ||
                        $colorNew != $product['color_name']
                    ) {
                        $old_color_name = $product['color_name'];
                        $editProductModel->updateProduct(
                            $descriptionNew, $description_id, $materialNew, $material_id, $sexNew, $sex_id,
                            $colorNew, $color_id, $variantNew, $variant_id, $nameNew, $stockNew, $priceNew, $pictureNew, $id,
                            $old_color_name // truyền thêm biến này
                        );
                        header("Location: /WEB_2/admin/products");
                        exit();
                    }
                }
            } 
            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/html/SuaSanPham.php";
        }
        else {
            die("Không tìm thấy sản phẩm hoặc lỗi truy vấn.");
        }
    }
    else {
        die("Không nhận được ID sản phẩm.");
    } 
?>