<?php
// app/models/OrderItems.php

require_once 'database.php';
$table_order_items = $db->handle("CREATE TABLE IF NOT EXISTS order_items (
    id_order_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT UNSIGNED NOT NULL,
    product_id INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id_order),
    FOREIGN KEY (product_id) REFERENCES products(id_product)
)");



class OrderItems {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Thêm sản phẩm vào đơn hàng
    public function addOrderItem($id_order, $id_product, $quantity, $price) {
        $sql = "INSERT INTO order_items (id_order, id_product, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$id_order, $id_product, $quantity, $price]);
    }

    // Lấy thông tin một sản phẩm trong đơn hàng
    public function getOrderItem($id) {
        $sql = "SELECT oi.*, p.name as product_name, p.picture_path 
                FROM order_items oi 
                LEFT JOIN products p ON oi.id_product = p.id_product 
                WHERE oi.id_order_item = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    

    // Cập nhật thông tin sản phẩm trong đơn hàng
    public function updateOrderItem($id, $id_order, $id_product, $quantity, $price) {
        $sql = "UPDATE order_items SET id_order = ?, id_product = ?, quantity = ?, price = ? 
                WHERE id_order_item = ?";
        return $this->db->handle($sql, [$id_order, $id_product, $quantity, $price, $id]);
    }

    // Xóa sản phẩm khỏi đơn hàng
    public function deleteOrderItem($id) {
        $sql = "DELETE FROM order_items WHERE id_order_item = ?";
        return $this->db->handle($sql, [$id]);
    }
     public function getOrderItemsByOrder($orderId) {
        require 'db_connect.php';
        $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        return $items;
    }
}
?>
