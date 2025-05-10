<?php 
    include_once "../../models/tables/database.php";
    include_once "../../models/tables/product.php";
    include_once "../../models/tables/description.php";
    include_once "../../models/tables/sex.php";
    include_once "../../models/tables/color.php";
    include_once "../../models/tables/material.php";
    include_once "../../models/tables/product_variant.php";

    class addProduct {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function addProduct($product_name, $product_image, $product_quantity, $product_price, $product_description, $product_color, $product_material, $product_sex, $product_variant) {
            $this->db->handle("INSERT INTO DESCRIPTIONS (description_content) VALUES ('$product_description')");
            $description_id = $this->db->getInsertId();
            $this->db->handle("INSERT INTO COLORS (color_name) VALUES ('$product_color')");
            $color_id = $this->db->getInsertId();
            $this->db->handle("INSERT INTO MATERIALS (material_name) VALUES ('$product_material')");
            $material_id = $this->db->getInsertId();
            $this->db->handle("INSERT INTO SEX (sex_name) VALUES ('$product_sex')");
            $sex_id = $this->db->getInsertId();
            $this->db->handle("INSERT INTO PRODUCT_VARIANT (product_variant_name) VALUES ('$product_variant')");
            $variant_id = $this->db->getInsertId();
            $this->db->handle("
                INSERT INTO PRODUCT (product_name, picture_path, stock, price, color_id, material_id, sex_id, product_variant_id, description_id)
                VALUES ('$product_name', '$product_image', '$product_quantity', '$product_price', '$color_id', '$material_id', '$sex_id', '$variant_id', '$description_id')
            ");
        }

        public function addImage() {
            echo '<img src="../../../public/img/' . htmlspecialchars($_FILES['product_img']['name']) . '" alt="Hình ảnh" style="width: 70px; height: 70px;">';
        }
        
    }
?>