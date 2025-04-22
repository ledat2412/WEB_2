<?php
session_start();

class CartController {
    //them sanpham vo gio hang
    public function add($product_id) {
        $_SESSION['cart'][$product_id] = ($_SESSION['cart'][$product_id] ?? 0) + 1;
        header("Location: /cart");
    }
    //hien thi gio hang
    public function show() {
        include 'app/views/cart.php';
    }
    // xoa 1 san pham
    public function remove($product_id) {
        unset($_SESSION['cart'][$product_id]);
        header("Location: /cart");
    }
    // xoa toan bo giohang
    public function clear() {
        unset($_SESSION['cart']);
        header("Location: /cart");
    }
}
