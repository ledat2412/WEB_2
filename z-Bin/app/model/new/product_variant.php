<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_product_variant = $db->exec("CREATE TABLE IF NOT EXISTS product_variant (
    id_product_variant INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_product INT UNSIGNED NOT NULL,
)");

class ProductVariant {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addVariant($id_product, $size, $color_id, $material_id, $price) {
        $sql = "INSERT INTO product_variant (id_product, size, color_id, material_id, price) VALUES (?, ?, ?, ?, ?)";
        return $this->db->exec($sql, [$id_product, $size, $color_id, $material_id, $price]);
    }

    public function getVariant($id) {
        $sql = "SELECT * FROM product_variant WHERE id_product_variant = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllVariants() {
        $sql = "SELECT * FROM product_variant";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateVariant($id, $name) {
        $sql = "UPDATE product_variant SET name = ? WHERE id_product_variant = ?";
        return $this->db->exec($sql, [$name, $id]);
    }

    public function deleteVariant($id) {
        $sql = "DELETE FROM product_variant WHERE id_product_variant = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 