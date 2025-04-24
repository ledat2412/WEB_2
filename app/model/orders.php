<?php
require_once 'database.php';
require_once 'users.php';
require_once 'addresses.php';

// Khởi tạo kết nối database
$db = new database();

$table_orders = $db->handle("CREATE TABLE IF NOT EXISTS orders (
    id_order INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(11) UNSIGNED NOT NULL,
    id_address INT UNSIGNED NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    address INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (address) REFERENCES addresses(id_address)
)");

class Orders {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addOrder($id_user, $id_address, $status = 'pending') {
        $sql = "INSERT INTO orders (id_user, id_address, status) VALUES (?, ?, ?)";
        return $this->db->handle($sql, [$id_user, $id_address, $status]);
    }

    public function getOrder($id) {
        $sql = "SELECT o.*, u.username, a.address as shipping_address 
                FROM orders o 
                LEFT JOIN users u ON o.id_user = u.id_users 
                LEFT JOIN addresses a ON o.id_address = a.id_address 
                WHERE o.id_order = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getOrdersByUser($id_user) {
        $sql = "SELECT o.*, a.address as shipping_address 
                FROM orders o 
                LEFT JOIN addresses a ON o.id_address = a.id_address 
                WHERE o.id_user = ?";
        $this->db->handle($sql, [$id_user]);
        return $this->db->getData($sql);
    }

    public function getAllOrders() {
        $sql = "SELECT o.*, u.username, a.address as shipping_address 
                FROM orders o 
                LEFT JOIN users u ON o.id_user = u.id_users 
                LEFT JOIN addresses a ON o.id_address = a.id_address";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateOrder($id, $id_user, $id_address, $status) {
        $sql = "UPDATE orders SET id_user = ?, id_address = ?, status = ? WHERE id_order = ?";
        return $this->db->handle($sql, [$id_user, $id_address, $status, $id]);
    }

    public function deleteOrder($id) {
        $sql = "DELETE FROM orders WHERE id_order = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 