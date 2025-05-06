<?php
// index.php

require_once '../app/controllers/OrderController.php';

// Kiểm tra nếu order_id được truyền qua URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id']; // Lấy order_id từ URL
} else {
    echo "Order ID không hợp lệ.";
    exit;
}

// Khởi tạo controller và lấy thông tin đơn hàng
$orderController = new OrderController();
$orderController->getOrderItems($order_id);
?>
