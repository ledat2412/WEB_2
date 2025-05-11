<?php
// app/models/OrderItems.php

require_once 'database.php';
$db = new Database();

$table_order_items = $db->handle("CREATE TABLE IF NOT EXISTS order_items (
    id_order_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT UNSIGNED NOT NULL,
    product_id INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id_order),
    FOREIGN KEY (product_id) REFERENCES product(id_product)
)");

// Khi tạo bảng product, cần có trường price (nếu chưa có thì thêm vào migration hoặc phpMyAdmin):
// ALTER TABLE product ADD COLUMN price DECIMAL(10,2) DEFAULT 0;

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
        $sql = "SELECT oi.*, p.product_name, p.picture_path 
                FROM order_items oi 
                LEFT JOIN product p ON oi.id_product = p.id_product 
                WHERE oi.id_order_item = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    // Lấy danh sách sản phẩm trong một đơn hàng
    public function getOrderItemsByOrder($id_order) {
        $id_order = intval($id_order); // đảm bảo là số nguyên
        $sql = "SELECT oi.*, p.product_name, p.picture_path 
                FROM order_items oi 
                LEFT JOIN product p ON oi.id_product = p.id_product 
                WHERE oi.id_order = $id_order";
        $this->db->handle($sql);
        return $this->db->getData($sql); // Trả về tất cả sản phẩm trong đơn hàng
    }

    // Lấy danh sách sản phẩm bán chạy nhất (tối đa 50 sản phẩm để lọc trùng tên)
    public function getBestSellerProducts() {
        $sql = "SELECT p.id_product, p.product_name, p.picture_path, p.price, COALESCE(SUM(oi.quantity), 0) as total_sold
                FROM product p
                LEFT JOIN order_items oi ON p.id_product = oi.id_product
                GROUP BY p.id_product
                ORDER BY total_sold DESC
                LIMIT 50";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    // Lấy danh sách sản phẩm phổ thông (tối đa 50 sản phẩm để lọc trùng tên)
    public function getNormalProducts() {
        $sql = "SELECT p.id_product, p.product_name, p.picture_path, p.price, COALESCE(SUM(oi.quantity), 0) as total_sold
                FROM product p
                LEFT JOIN order_items oi ON p.id_product = oi.id_product
                GROUP BY p.id_product
                ORDER BY total_sold ASC
                LIMIT 50";
        $this->db->handle($sql);
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
}
?>
