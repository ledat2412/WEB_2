<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_colors = $db->exec("CREATE TABLE IF NOT EXISTS colors (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)");

class Colors {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addColor($name) {
        $sql = "INSERT INTO colors (name) VALUES (?)";
        return $this->db->exec($sql, [$name]);
    }

    public function getColor($id) {
        $sql = "SELECT * FROM colors WHERE id = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllColors() {
        $sql = "SELECT * FROM colors";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateColor($id, $name) {
        $sql = "UPDATE colors SET name = ? WHERE id = ?";
        return $this->db->exec($sql, [$name, $id]);
    }

    public function deleteColor($id) {
        $sql = "DELETE FROM colors WHERE id = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 