<?php
require_once 'database.php';
require_once 'product.php';

// Khởi tạo kết nối database
$db = new database();

$table_descriptions = $db->handle("CREATE TABLE IF NOT EXISTS descriptions (
    id_description INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL
)");

if (!class_exists('Descriptions')) {
    class Descriptions {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function addDescription($content) {
            $sql = "INSERT INTO descriptions (content) VALUES (?)";
            return $this->db->handle($sql, [$content]);
        }

        public function getDescription($id) {
            $sql = "SELECT * FROM descriptions WHERE id_description = ?";
            $this->db->handle($sql, [$id]);
            return $this->db->getData($sql);
        }

        public function getAllDescriptions() {
            $sql = "SELECT d.*, p.name as product_name 
                    FROM descriptions d 
                    LEFT JOIN products p ON d.id_product = p.id_product 
                    ORDER BY d.created_at DESC";
            $this->db->handle($sql);
            return $this->db->getData($sql);
        }

        public function updateDescription($id, $id_product, $title, $content) {
            $sql = "UPDATE descriptions SET id_product = ?, title = ?, content = ? 
                    WHERE id_description = ?";
            return $this->db->handle($sql, [$id_product, $title, $content, $id]);
        }

        public function deleteDescription($id) {
            $sql = "DELETE FROM descriptions WHERE id_description = ?";
            return $this->db->handle($sql, [$id]);
        }
    }
}
?>