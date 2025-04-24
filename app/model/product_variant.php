<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new database();

$table_product_variant = $db->handle("CREATE TABLE IF NOT EXISTS product_variant (
    id_product_variant INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)");

class ProductVariant {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addVariant($name) {
        $sql = "INSERT INTO product_variant (name) VALUES (?)";
        return $this->db->handle($sql, [$name]);
    }

    public function getVariant($id) {
        $sql = "SELECT * FROM product_variant WHERE id_product_variant = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getAllVariants() {
        $sql = "SELECT * FROM product_variant ORDER BY name";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateVariant($id, $name) {
        $sql = "UPDATE product_variant SET name = ? WHERE id_product_variant = ?";
        return $this->db->handle($sql, [$name, $id]);
    }

    public function deleteVariant($id) {
        $sql = "DELETE FROM product_variant WHERE id_product_variant = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 