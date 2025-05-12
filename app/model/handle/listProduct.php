<?php 
include_once "../../../app/model/database.php";
include_once "../../../app/model/product.php";
include_once "../../../app/model/descriptions.php";
include_once "../../../app/model/sex.php";
include_once "../../../app/model/colors.php";
include_once "../../../app/model/materials.php";
include_once "../../../app/model/product_variant.php";

class listProduct {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function getListProduct() {
        $sql = "SELECT 
        P.id_product AS product_id, P.product_name, P.price, P.stock, P.picture_path,
        C.name AS color_name, M.name AS material_name, S.name AS sex_name, 
        V.name AS variant_name, D.content AS content
        FROM product P
        JOIN colors C ON P.color_id = C.id_color
        JOIN materials M ON P.material_id = M.id_material
        JOIN sex S ON P.sex_id = S.id_sex
        JOIN product_variant V ON P.id_product_variant = V.id_product_variant
        JOIN descriptions D ON P.description_id = D.id_description";

        return $this->db->getData($sql);
    }
    
    // Xóa sản phẩm theo id (an toàn với ràng buộc khóa ngoại)
    public function deleteListProductById($id) {
        $id = intval($id);
        $db = new database();

        // Xóa các bản ghi liên quan trong bảng cart trước
        $db->handle("DELETE FROM cart WHERE id_product = $id");

        // Xóa các bản ghi liên quan trong bảng order_items trước
        $db->handle("DELETE FROM order_items WHERE id_product = $id");

        // Sau đó mới xóa sản phẩm
        return $db->handle("DELETE FROM product WHERE id_product = $id");
    }
}

?>