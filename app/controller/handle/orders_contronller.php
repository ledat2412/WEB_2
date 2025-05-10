<?php 
    include_once "../../../app/model/database.php";
    include_once "../../../app/model/handle/orders.php";

    $orderModel = new orders();

    if (isset($_POST['update_status'])) {
        $orderModel->getUpdateStatus($_POST['order_id'], $_POST['status']);
    }

    if (isset($_POST['btn_filter'])) {
        $order_product = $orderModel->getFilterOrders($_POST['district'], $_POST['status']);
    } else {
        $order_product = $orderModel->getAllOrders();
    }

    // Sửa lại đường dẫn include cho đúng với cấu trúc thư mục thực tế
    include_once "../../view/html/DonHang.php";

?>