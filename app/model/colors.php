<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new database();

$table_colors = $db->handle("CREATE TABLE IF NOT EXISTS colors (
    id_color INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    hex_code VARCHAR(7) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

class Colors {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addColor($name, $hex_code) {
        $sql = "INSERT INTO colors (name, hex_code) VALUES (?, ?)";
        return $this->db->handle($sql, [$name, $hex_code]);
    }

    public function getColor($id) {
        $sql = "SELECT * FROM colors WHERE id_color = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllColors() {
        $sql = "SELECT * FROM colors ORDER BY name ASC";
        $this->db->handle($sql);
        return $this->db->getData();
    }

    public function updateColor($id, $name, $hex_code) {
        $sql = "UPDATE colors SET name = ?, hex_code = ? WHERE id_color = ?";
        return $this->db->handle($sql, [$name, $hex_code, $id]);
    }

    public function deleteColor($id) {
        $sql = "DELETE FROM colors WHERE id_color = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 