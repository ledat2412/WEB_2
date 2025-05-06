<?php
// app/controllers/OrderController.php


require_once __DIR__ . '/../model/order_items.php';



class OrderController {
    private $orderItemsModel;

    public function __construct() {
        // Khởi tạo Model OrderItems
        $this->orderItemsModel = new OrderItems();
    }

    // Phương thức để lấy thông tin các sản phẩm trong đơn hàng
    public function getOrderItems($order_id) {
        // Lấy tất cả các sản phẩm trong đơn hàng
        $items = $this->orderItemsModel->getOrderItemsByOrder($order_id);

        // Truyền dữ liệu vào View để hiển thị
        require_once 'app/views/order/detail.php';
    }
}
?>
