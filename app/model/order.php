<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_order = $db->exec("CREATE TABLE IF NOT EXISTS `order` (
    id_order INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    status ENUM('order', 'packed', 'shipping', 'finish') NOT NULL DEFAULT 'order',
    address INT UNSIGNED NOT NULL,
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (address) REFERENCES addresses(id_address)
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
        $sql = "SELECT o.*, a.receiver_name, a.phone, a.address as shipping_address
                FROM `order` o
                JOIN addresses a ON o.address = a.id_address
                WHERE o.id_order = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getUserOrders($id_user) {
        $sql = "SELECT o.*, a.receiver_name, a.phone, a.address as shipping_address
                FROM `order` o
                JOIN addresses a ON o.address = a.id_address
                WHERE o.id_user = ?
                ORDER BY o.order_date DESC";
        $this->db->exec($sql, [$id_user]);
        return $this->db->getData();
    }

    public function updateOrderStatus($id, $status) {
        $sql = "UPDATE `order` SET status = ? WHERE id_order = ?";
        return $this->db->exec($sql, [$status, $id]);
    }

    public function getOrderWithItems($id) {
        $sql = "SELECT o.*, a.receiver_name, a.phone, a.address as shipping_address,
                oi.id_order_item, oi.quantity, oi.price,
                pv.size, p.name as product_name,
                c.name as color_name, m.name as material_name
                FROM `order` o
                JOIN addresses a ON o.address = a.id_address
                JOIN order_items oi ON o.id_order = oi.id_order
                JOIN product_variants pv ON oi.id_variant = pv.id_variant
                JOIN product p ON pv.id_product = p.id_product
                LEFT JOIN colors c ON pv.color_id = c.id
                LEFT JOIN materials m ON pv.material_id = m.id
                WHERE o.id_order = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getOrderTotal($id) {
        $sql = "SELECT SUM(quantity * price) as total
                FROM order_items
                WHERE id_order = ?";
        $this->db->exec($sql, [$id]);
        $result = $this->db->getData();
        return $result[0]['total'] ?? 0;
    }
}
?> 