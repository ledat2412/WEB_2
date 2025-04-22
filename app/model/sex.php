<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new database();

$table_sex = $db->handle("CREATE TABLE IF NOT EXISTS sex (
    id_sex INT UNSIGNED PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
)");

class Sex {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addSex($name) {
        $sql = "INSERT INTO sex (name) VALUES (?)";
        return $this->db->handle($sql, [$name]);
    }

    public function getSex($id) {
        $sql = "SELECT * FROM sex WHERE id_sex = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllSex() {
        $sql = "SELECT * FROM sex ORDER BY name ASC";
        $this->db->handle($sql);
        return $this->db->getData();
    }

    public function updateSex($id, $name) {
        $sql = "UPDATE sex SET name = ? WHERE id_sex = ?";
        return $this->db->handle($sql, [$name, $id]);
    }

    public function deleteSex($id) {
        $sql = "DELETE FROM sex WHERE id_sex = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 