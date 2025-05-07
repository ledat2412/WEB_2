<?php
require_once 'database.php';
require_once 'users.php';
require_once 'addresses.php';

// Khởi tạo kết nối database
$db = new database();

$table_orders = $db->handle("CREATE TABLE IF NOT EXISTS orders (
    id_order INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(11) UNSIGNED NOT NULL,
    id_address INT(11) UNSIGNED NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_address) REFERENCES addresses(id_address)
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
        return $this->db->getData($sql);  // Trả về dữ liệu chi tiết đơn hàng
    }

    public function getOrdersByUser($id_user) {
        $sql = "SELECT o.*, a.address as shipping_address 
                FROM orders o 
                LEFT JOIN addresses a ON o.id_address = a.id_address 
                WHERE o.id_user = ?";
        $this->db->handle($sql, [$id_user]);
        return $this->db->getData($sql);  // Trả về danh sách đơn hàng
    }

    public function addOrderItem($order_id, $product_id, $quantity, $price) {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$order_id, $product_id, $quantity, $price]);
    }

    // Lấy chi tiết sản phẩm của đơn hàng
    public function getOrderItems($order_id) {
        $sql = "SELECT oi.*, p.product_name 
                FROM order_items oi
                LEFT JOIN products p ON oi.product_id = p.id_product
                WHERE oi.order_id = ?";
        $this->db->handle($sql, [$order_id]);
        return $this->db->getData($sql);
    }
}
?> 