<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_product = $db->exec("CREATE TABLE IF NOT EXISTS product (
    id_product INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    picture_path VARCHAR(255) DEFAULT NULL,
    description_id INT UNSIGNED DEFAULT NULL,
    FOREIGN KEY (description_id) REFERENCES descriptions(id)
)");

class Product {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addProduct($name, $picture_path = null, $description_id = null) {
        $sql = "INSERT INTO product (name, picture_path, description_id) VALUES (?, ?, ?)";
        return $this->db->exec($sql, [$name, $picture_path, $description_id]);
    }

    public function getProduct($id) {
        $sql = "SELECT * FROM product WHERE id_product = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM product";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateProduct($id, $name, $picture_path = null, $description_id = null) {
        $sql = "UPDATE product SET name = ?, picture_path = ?, description_id = ? WHERE id_product = ?";
        return $this->db->exec($sql, [$name, $picture_path, $description_id, $id]);
    }

    public function updateProductPicture($id, $picture_path) {
        $sql = "UPDATE product SET picture_path = ? WHERE id_product = ?";
        return $this->db->exec($sql, [$picture_path, $id]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE id_product = ?";
        return $this->db->exec($sql, [$id]);
    }

    public function getProductWithDescription($id) {
        $sql = "SELECT p.*, d.content as description FROM product p 
                LEFT JOIN descriptions d ON p.description_id = d.id 
                WHERE p.id_product = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }
}
?> 