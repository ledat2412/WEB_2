<?php 
    include_once "../../models/tables/database.php";
    include_once "../../models/tables/product.php";
    include_once "../../models/tables/description.php";
    include_once "../../models/tables/sex.php";
    include_once "../../models/tables/color.php";
    include_once "../../models/tables/material.php";
    include_once "../../models/tables/product_variant.php";

    class editProduct {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function getProduct($id) {
            $sql = ("SELECT P.product_id, P.product_name, P.stock, P.price, P.picture_path, C.color_name, M.material_name, S.sex_name, V.product_variant_name, D.description_content, P.color_id, P.material_id, P.sex_id, P.description_id, P.product_variant_id
            FROM PRODUCT P
            JOIN COLORS C ON P.color_id = C.color_id
            JOIN MATERIALS M ON P.material_id = M.material_id
            JOIN SEX S ON P.sex_id = S.sex_id
            JOIN PRODUCT_VARIANT V ON P.product_variant_id = V.product_variant_id
            JOIN DESCRIPTIONS D ON P.description_id = D.description_id
            WHERE P.product_id = '$id'");
            return $this->db->getData($sql);
        }

        public function updateProduct($descriptionNew, $description_id, $materialNew, $material_id, $sexNew, $sex_id, $colorNew, $color_id, $variantNew, $variant_id, $nameNew, $stockNew, $priceNew, $pictureNew, $id) {
            // Cập nhật các bảng con
            $this->db->handle("UPDATE DESCRIPTIONS SET description_content = '$descriptionNew' WHERE description_id = '$description_id'");
            $this->db->handle("UPDATE MATERIALS SET material_name = '$materialNew' WHERE material_id = '$material_id'");
            $this->db->handle("UPDATE SEX SET sex_name = '$sexNew' WHERE sex_id = '$sex_id'");
            $this->db->handle("UPDATE COLORS SET color_name = '$colorNew' WHERE color_id = '$color_id'");
            $this->db->handle("UPDATE PRODUCT_VARIANT SET product_variant_name = '$variantNew' WHERE product_variant_id = '$variant_id'");

            // Cập nhật bảng chính PRODUCT
            $this->db->handle("UPDATE PRODUCT SET
                product_name = '$nameNew',
                stock = '$stockNew',
                price = '$priceNew',
                picture_path = '$pictureNew'
                WHERE product_id = '$id'");

        }
    }

    
?>