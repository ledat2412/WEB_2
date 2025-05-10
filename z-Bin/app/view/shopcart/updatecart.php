<?php
session_start();
require_once '../controller/CartController.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /WEB_2/app/view/log/signin.php');
    exit();
}

$cartController = new CartController();
$id_user = $_SESSION['user_id'];

if (isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $id_product => $new_quantity) {
        // Cập nhật số lượng sản phẩm
        $cartController->updateQuantity($id_product, $new_quantity);
    }
}

// Chuyển hướng về trang giỏ hàng
header('Location: /web/cart.php');
exit();
?>
