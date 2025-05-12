<?php 
    include_once "../../../app/model/handle/addProduct.php";
    include_once "../../../app/model/database.php";

    $addProductModel = new addProduct();

    // Lấy danh sách giới tính, màu sắc, vật liệu
    $sexList = $addProductModel->getSexList();
    $colorList = $addProductModel->getColorList();
    $materialList = $addProductModel->getMaterialList();
    $variantList = $addProductModel->getVariantList();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST["btn"])) {
            $product_name = $_POST["product_name"];
            $product_price = $_POST["product_price"];
            $product_description = $_POST["product_description"];
            $product_code = $_POST["product_code"];
            $product_color = $_POST["color"];
            $product_quantity = $_POST["product_quantity"];
            $product_material = $_POST["product_material"];
            $product_sex = $_POST["sex"];
            $product_variant = $_POST["product_variant"];

            // Đảm bảo chỉ có một thư mục loại sản phẩm (giữ nguyên tên gốc, không chuyển về thường, không bỏ dấu)
            $base_dir = "../../../public/assets/img/Sản Phẩm/";
            $variant_folder = trim($product_variant);
            if ($variant_folder == '') $variant_folder = 'Khac';

            $main_variant_dir = $base_dir . $variant_folder . '/';
            if (!is_dir($main_variant_dir)) {
                mkdir($main_variant_dir, 0777, true);
            }

            // Tạo thư mục con theo mã sản phẩm (shoe_code)
            $sub_folder = trim($product_code);
            $sub_folder = preg_replace('/[^\w\-]/u', '', $sub_folder); // loại ký tự đặc biệt
            if ($sub_folder == '') $sub_folder = 'SanPhamMoi';

            $target_dir = $main_variant_dir . $sub_folder . '/';
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Xử lý upload ảnh
            if (!empty($_FILES["product_img"]["name"])) {
                $product_image = $_FILES["product_img"]["name"];
                $target_file = $target_dir . basename($product_image);
                move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file);
                // Đường dẫn lưu vào DB đúng định dạng yêu cầu (tới thư mục con sản phẩm)
                $picture_path = $target_dir;
            } else {
                $picture_path = "";
            }

            // Thêm sản phẩm (truyền $picture_path thay vì tên file)
            $addProductModel->addProduct(
                $product_name,
                $picture_path,
                $product_quantity,
                $product_price,
                $product_description,
                $product_color,
                $product_material,
                $product_sex,
                $product_variant,
                $product_code
            );
            header("Location: /WEB_2/admin/products");
            exit();
        }
    }
    // Đúng đường dẫn view (dùng đường dẫn vật lý tuyệt đối)
    include_once $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/html/ThemSanPhamMoi.php";
?>