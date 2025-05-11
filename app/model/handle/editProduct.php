<?php 
    include_once "../../../app/model/database.php";
    include_once "../../../app/model/product.php";
    include_once "../../../app/model/descriptions.php";
    include_once "../../../app/model/sex.php";
    include_once "../../../app/model/colors.php";
    include_once "../../../app/model/materials.php";
    include_once "../../../app/model/product_variant.php";

    class editProduct {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function getProduct($id) {
            // Sửa lại tên bảng và cột cho đúng với database thực tế (thường là id_product, product, ...)
            $sql = ("SELECT P.id_product AS product_id, P.product_name, P.stock, P.price, P.picture_path, 
                            C.name AS color_name, M.name AS material_name, S.name AS sex_name, 
                            V.name AS product_variant_name, D.content AS description_content, 
                            P.color_id, P.material_id, P.sex_id, P.description_id, P.id_product_variant AS product_variant_id
                    FROM product P
                    JOIN colors C ON P.color_id = C.id_color
                    JOIN materials M ON P.material_id = M.id_material
                    JOIN sex S ON P.sex_id = S.id_sex
                    JOIN product_variant V ON P.id_product_variant = V.id_product_variant
                    JOIN descriptions D ON P.description_id = D.id_description
                    WHERE P.id_product = '$id'");
            return $this->db->getData($sql);
        }

        public function updateProduct($descriptionNew, $description_id, $materialNew, $material_id, $sexNew, $sex_id, $colorNew, $color_id, $variantNew, $variant_id, $nameNew, $stockNew, $priceNew, $pictureNew, $id) {
            // Cập nhật các bảng con
            $this->db->handle("UPDATE descriptions SET content = '$descriptionNew' WHERE id_description = '$description_id'");
            $this->db->handle("UPDATE materials SET name = '$materialNew' WHERE id_material = '$material_id'");
            $this->db->handle("UPDATE sex SET name = '$sexNew' WHERE id_sex = '$sex_id'");
            $this->db->handle("UPDATE colors SET name = '$colorNew' WHERE id_color = '$color_id'");
            $this->db->handle("UPDATE product_variant SET name = '$variantNew' WHERE id_product_variant = '$variant_id'");

            // Cập nhật bảng chính PRODUCT
            $this->db->handle("UPDATE product SET
                product_name = '$nameNew',
                stock = '$stockNew',
                price = '$priceNew',
                picture_path = '$pictureNew'
                WHERE id_product = '$id'");

        }

        public function getSexList() {
            $sql = "SELECT * FROM sex";
            $result = $this->db->conn->query($sql);
            $sexList = [];
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $sexList[] = $row;
                }
            }
            return $sexList;
        }

        public function getColorList() {
            $sql = "SELECT * FROM colors";
            $result = $this->db->conn->query($sql);
            $colorList = [];
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $colorList[] = $row;
                }
            }
            return $colorList;
        }

        public function getMaterialList() {
            $sql = "SELECT * FROM materials";
            $result = $this->db->conn->query($sql);
            $materialList = [];
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $materialList[] = $row;
                }
            }
            return $materialList;
        }

        public function getVariantList() {
            $sql = "SELECT * FROM product_variant";
            $result = $this->db->conn->query($sql);
            $variantList = [];
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $variantList[] = $row;
                }
            }
            return $variantList;
        }
    }

    
?>