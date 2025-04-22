<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_sex = $db->exec("CREATE TABLE IF NOT EXISTS sex (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)");

class Sex {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addSex($name) {
        $sql = "INSERT INTO sex (name) VALUES (?)";
        return $this->db->exec($sql, [$name]);
    }

    public function getSex($id) {
        $sql = "SELECT * FROM sex WHERE id = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllSex() {
        $sql = "SELECT * FROM sex";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateSex($id, $name) {
        $sql = "UPDATE sex SET name = ? WHERE id = ?";
        return $this->db->exec($sql, [$name, $id]);
    }

    public function deleteSex($id) {
        $sql = "DELETE FROM sex WHERE id = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 