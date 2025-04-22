<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_materials = $db->exec("CREATE TABLE IF NOT EXISTS materials (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)");

class Materials {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addMaterial($name) {
        $sql = "INSERT INTO materials (name) VALUES (?)";
        return $this->db->exec($sql, [$name]);
    }

    public function getMaterial($id) {
        $sql = "SELECT * FROM materials WHERE id = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllMaterials() {
        $sql = "SELECT * FROM materials";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateMaterial($id, $name) {
        $sql = "UPDATE materials SET name = ? WHERE id = ?";
        return $this->db->exec($sql, [$name, $id]);
    }

    public function deleteMaterial($id) {
        $sql = "DELETE FROM materials WHERE id = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 