<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new database();

$table_materials = $db->handle("CREATE TABLE IF NOT EXISTS materials (
    id_material INT UNSIGNED PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
)");

if (!class_exists('Materials')) {
    class Materials {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function addMaterial($name) {
            $sql = "INSERT INTO materials (name) VALUES (?)";
            return $this->db->handle($sql, [$name]);
        }

        public function getMaterial($id) {
            $sql = "SELECT * FROM materials WHERE id_material = ?";
            $this->db->handle($sql, [$id]);
            return $this->db->getData($sql);
        }

        public function getAllMaterials() {
            $sql = "SELECT * FROM materials ORDER BY name ASC";
            $this->db->handle($sql);
            return $this->db->getData($sql);
        }

        public function updateMaterial($id, $name) {
            $sql = "UPDATE materials SET name = ? WHERE id_material = ?";
            return $this->db->handle($sql, [$name, $id]);
        }

        public function deleteMaterial($id) {
            $sql = "DELETE FROM materials WHERE id_material = ?";
            return $this->db->handle($sql, [$id]);
        }
    }
}
?>