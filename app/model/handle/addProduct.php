<?php 
    include_once "../../../app/model/database.php";
    include_once "../../../app/model/product.php";
    include_once "../../../app/model/descriptions.php";
    include_once "../../../app/model/sex.php";
    include_once "../../../app/model/colors.php";
    include_once "../../../app/model/materials.php";
    include_once "../../../app/model/product_variant.php";

    class addProduct {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function addProduct($product_name, $product_image, $product_quantity, $product_price, $product_description, $product_color, $product_material, $product_sex, $product_variant, $shoe_code) {
            $this->db->handle("INSERT INTO descriptions (content) VALUES ('$product_description')");
            $description_id = $this->db->getInsertId();

            // Lấy hoặc thêm màu
            $color_row = $this->db->getData("SELECT id_color FROM colors WHERE name = '$product_color'");
            if (!empty($color_row)) {
                $color_id = $color_row[0]['id_color'];
            } else {
                $this->db->handle("INSERT INTO colors (name) VALUES ('$product_color')");
                $color_id = $this->db->getInsertId();
            }

            // Lấy hoặc thêm vật liệu
            $material_row = $this->db->getData("SELECT id_material FROM materials WHERE name = '$product_material'");
            if (!empty($material_row)) {
                $material_id = $material_row[0]['id_material'];
            } else {
                $this->db->handle("INSERT INTO materials (name) VALUES ('$product_material')");
                $material_id = $this->db->getInsertId();
            }

            // Lấy hoặc thêm giới tính
            $sex_row = $this->db->getData("SELECT id_sex FROM sex WHERE name = '$product_sex'");
            if (!empty($sex_row)) {
                $sex_id = $sex_row[0]['id_sex'];
            } else {
                $this->db->handle("INSERT INTO sex (name) VALUES ('$product_sex')");
                $sex_id = $this->db->getInsertId();
            }

            // Lấy hoặc thêm loại sản phẩm
            $variant_row = $this->db->getData("SELECT id_product_variant FROM product_variant WHERE name = '$product_variant'");
            if (!empty($variant_row)) {
                $variant_id = $variant_row[0]['id_product_variant'];
            } else {
                $this->db->handle("INSERT INTO product_variant (name) VALUES ('$product_variant')");
                $variant_id = $this->db->getInsertId();
            }

            // Đường dẫn đúng định dạng yêu cầu: ../../../public/assets/img/Sản Phẩm/{loai}/{ma}
            $picture_path = "../../../public/assets/img/Sản Phẩm/" . $product_variant . "/" . $shoe_code;

            $this->db->handle("
                INSERT INTO product (product_name, shoe_code, picture_path, stock, price, color_id, material_id, sex_id, id_product_variant, description_id)
                VALUES ('$product_name', '$shoe_code', '$picture_path', '$product_quantity', '$product_price', '$color_id', '$material_id', '$sex_id', '$variant_id', '$description_id')
            ");
        }

        public function addImage() {
            echo '<img src="../../../public/img/' . htmlspecialchars($_FILES['product_img']['name']) . '" alt="Hình ảnh" style="width: 70px; height: 70px;">';
        }
        
    }
?>