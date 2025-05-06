<?php
ob_start();
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];

header('Location: '.$uri.'/WEB_2/Lining');
exit; 

// Tiếp theo, bạn có thể xử lý phần logic của controller
require_once 'app/controllers/OrderController.php';

// Khởi tạo controller và lấy thông tin đơn hàng (ví dụ: order_id = 1)
$orderController = new OrderController();
$orderController->getOrderItems(1);

// Kết thúc output buffering
ob_end_flush();
?>
