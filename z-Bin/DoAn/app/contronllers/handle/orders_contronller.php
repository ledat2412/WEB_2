<?php 
    include_once "../../models/tables/database.php";
    include_once "../../models/handle/orders.php";

    $orderModel = new orders();

    if (isset($_POST['update_status'])) {
        $orderModel->getUpdateStatus($_POST['order_id'], $_POST['status']);
    }

    if (isset($_POST['btn_filter'])) {
        $order_product = $orderModel->getFilterOrders($_POST['district'], $_POST['status']);
    } else {
        $order_product = $orderModel->getAllOrders();
    }

    include_once "../../views/html/DonHang.php";

?>