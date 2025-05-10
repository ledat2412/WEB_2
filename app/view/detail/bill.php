<?php
// bill.php
require_once 'order.php';
require_once 'order_items.php';
require_once 'users.php';
require_once 'addresses.php';

$orderId = $_GET['order_id'] ?? null;

if (!$orderId) {
    echo "Không tìm thấy đơn hàng.";
    exit;
}

// Lấy thông tin đơn hàng
$orderModel = new Orders();
$orderData = $orderModel->getOrderById($orderId);

if (!$orderData) {
    echo "Đơn hàng không tồn tại.";
    exit;
}

// Lấy thông tin người dùng
$userModel = new Users();
$user = $userModel->getUserById($orderData['id_user']);

// Lấy địa chỉ giao hàng
$addressModel = new Addresses();
$address = $addressModel->getAddressById($orderData['id_address']);

// Lấy các sản phẩm trong đơn hàng
$orderItemsModel = new OrderItems();
$items = $orderItemsModel->getOrderItemsByOrder($orderId);
?>

<h2 class="product-page-title">Thông tin giao hàng</h2>
<div class="product-main-content">
    <div class="product-shipping-info">
        <h3><?= htmlspecialchars($user['username']) ?></h3>
        <form action="#" method="post">
            <div class="product-form-group">
                <label for="address-shop">Địa chỉ shop</label>
                <input type="text" id="address-shop" name="address-shop" value="TP.Hồ Chí Minh" disabled>
            </div>
            <div class="product-form-group">
                <label for="name">Họ và Tên</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['username']) ?>" disabled>
            </div>
            <div class="product-form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" disabled>
            </div>
            <div class="product-form-group">
                <label>Giao hàng</label>
                <div>
                    <input type="radio" id="giao-hang-tan-noi" name="giao-hang" value="Giao hàng tận nơi" checked>
                    <label for="giao-hang-tan-noi">Giao hàng tận nơi</label>
                </div>
                <div>
                    <input type="radio" id="nhan-tai-cua-hang" name="giao-hang" value="Nhận tại cửa hàng">
                    <label for="nhan-tai-cua-hang">Nhận tại cửa hàng</label>
                </div>
            </div>
            <div class="product-form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" id="address" name="address" value="<?= htmlspecialchars($address['address']) ?>" disabled>
            </div>
            <div class="product-form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
            </div>
            <div class="product-form-group">
                <label for="district">Quận / Huyện</label>
                <input type="text" id="district" name="district" value="<?= htmlspecialchars($address['district']) ?>" disabled>
            </div>
        </form>
    </div>

    <div class="product-order-items">
        <h3>Sản phẩm trong đơn hàng</h3>
        <ul>
            <?php foreach ($items as $item): ?>
                <li><?= htmlspecialchars($item['product_name']) ?> - SL: <?= $item['quantity'] ?> - Giá: <?= number_format($item['price']) ?>đ</li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
