<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_descriptions = $db->exec("CREATE TABLE IF NOT EXISTS descriptions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL
)");

class Descriptions {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addDescription($content) {
        $sql = "INSERT INTO descriptions (content) VALUES (?)";
        return $this->db->exec($sql, [$content]);
    }

    public function getDescription($id) {
        $sql = "SELECT * FROM descriptions WHERE id = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function updateDescription($id, $content) {
        $sql = "UPDATE descriptions SET content = ? WHERE id = ?";
        return $this->db->exec($sql, [$content, $id]);
    }

    public function deleteDescription($id) {
        $sql = "DELETE FROM descriptions WHERE id = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 