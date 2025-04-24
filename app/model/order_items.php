<?php
require_once 'database.php';
require_once 'orders.php';
require_once 'product.php';

// Khởi tạo kết nối database
$db = new database();

$table_order_items = $db->handle("CREATE TABLE IF NOT EXISTS order_items (
    id_order_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_order INT UNSIGNED NOT NULL,
    id_product INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_order) REFERENCES orders(id_order),
    FOREIGN KEY (id_product) REFERENCES product(id_product)
)");

class OrderItems {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addOrderItem($id_order, $id_product, $quantity, $price) {
        $sql = "INSERT INTO order_items (id_order, id_product, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$id_order, $id_product, $quantity, $price]);
    }

    public function getOrderItem($id) {
        $sql = "SELECT oi.*, p.name as product_name, p.picture_path 
                FROM order_items oi 
                LEFT JOIN products p ON oi.id_product = p.id_product 
                WHERE oi.id_order_item = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getOrderItemsByOrder($id_order) {
        $sql = "SELECT oi.*, p.name as product_name, p.picture_path 
                FROM order_items oi 
                LEFT JOIN products p ON oi.id_product = p.id_product 
                WHERE oi.id_order = ?";
        $this->db->handle($sql, [$id_order]);
        return $this->db->getData($sql);
    }

    public function getAllOrderItems() {
        $sql = "SELECT oi.*, p.name as product_name, p.picture_path, o.id_user 
                FROM order_items oi 
                LEFT JOIN products p ON oi.id_product = p.id_product 
                LEFT JOIN orders o ON oi.id_order = o.id_order";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateOrderItem($id, $id_order, $id_product, $quantity, $price) {
        $sql = "UPDATE order_items SET id_order = ?, id_product = ?, quantity = ?, price = ? 
                WHERE id_order_item = ?";
        return $this->db->handle($sql, [$id_order, $id_product, $quantity, $price, $id]);
    }

    public function deleteOrderItem($id) {
        $sql = "DELETE FROM order_items WHERE id_order_item = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 