<?php
// app/models/OrderItems.php

require_once 'database.php';


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

    // Lấy danh sách sản phẩm trong một đơn hàng
    public function getOrderItemsByOrder($id_order) {
        $sql = "SELECT oi.*, p.name as product_name, p.picture_path 
                FROM order_items oi 
                LEFT JOIN products p ON oi.id_product = p.id_product 
                WHERE oi.id_order = ?";
        $this->db->handle($sql, [$id_order]);
        return $this->db->getData($sql); // Trả về tất cả sản phẩm trong đơn hàng
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
