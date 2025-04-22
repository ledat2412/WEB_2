<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_order = $db->exec("CREATE TABLE IF NOT EXISTS `order` (
    id_order INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED,
    status ENUM('order', 'packed', 'shipping', 'finish') DEFAULT 'order',
    address VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_users)
)");

class Order {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function createOrder($id_user, $address) {
        $sql = "INSERT INTO `order` (id_user, address) VALUES (?, ?)";
        return $this->db->exec($sql, [$id_user, $address]);
    }

    public function getOrder($id) {
        $sql = "SELECT o.*, u.username FROM `order` o 
                LEFT JOIN users u ON o.id_user = u.id_users 
                WHERE o.id_order = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getUserOrders($id_user) {
        $sql = "SELECT o.*, u.username FROM `order` o 
                LEFT JOIN users u ON o.id_user = u.id_users 
                WHERE o.id_user = ?";
        $this->db->exec($sql, [$id_user]);
        return $this->db->getData();
    }

    public function getAllOrders() {
        $sql = "SELECT o.*, u.username FROM `order` o 
                LEFT JOIN users u ON o.id_user = u.id_users";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateOrderStatus($id, $status) {
        $sql = "UPDATE `order` SET status = ? WHERE id_order = ?";
        return $this->db->exec($sql, [$status, $id]);
    }

    public function deleteOrder($id) {
        $sql = "DELETE FROM `order` WHERE id_order = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 