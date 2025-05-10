<?php 
    include_once "../../models/tables/database.php";
    include_once "../../models/tables/product.php";
    include_once "../../models/tables/description.php";
    include_once "../../models/tables/sex.php";
    include_once "../../models/tables/color.php";
    include_once "../../models/tables/material.php";
    include_once "../../models/tables/product_variant.php";

    class listProduct {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function getListProduct() {
            $sql = "SELECT 
            P.product_id, P.product_name, P.picture_path, P.stock, P.price,
            C.color_name, M.material_name, S.sex_name, V.product_variant_name, D.description_content
            FROM PRODUCT P
            JOIN COLORS C ON P.color_id = C.color_id
            JOIN MATERIALS M ON P.material_id = M.material_id
            JOIN SEX S ON P.sex_id = S.sex_id
            JOIN PRODUCT_VARIANT V ON P.product_variant_id = V.product_variant_id
            JOIN DESCRIPTIONS D ON P.description_id = D.description_id";

            return $this->db->getData($sql);
        }
        
        public function deleteListProductById($id) {
            $this->db->handle("DELETE FROM PRODUCT WHERE product_id = '$id'");
        }
    }

?>