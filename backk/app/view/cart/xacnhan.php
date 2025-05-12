<?php
session_start();
require_once '../../model/orders.php';
require_once '../../model/order_items.php';
require_once '../../controller/CartController.php';
require_once '../../model/addresses.php';

// Nếu không có thông tin checkout, quay lại cart
if (empty($_SESSION['checkout_info'])) {
    header('Location: /WEB_2/app/controller/main.php?act=cart');
    exit();
}

$info = $_SESSION['checkout_info'];
$id_user = $info['id_user'];
$id_address = $info['id_address'];
$payment_method = $info['payment_method'];
$ship_method = $info['ship_method'];
$cart_items = $info['cart_items'];
$total = $info['total'];
$shipping_cost = $info['shipping_cost'];
$total_with_shipping = $info['total_with_shipping'];

// Lấy thông tin địa chỉ từ model addresses
$addressModel = new Addresses();
$address = [];
if ($id_address) {
    $result = $addressModel->getAddressById($id_address);
    if (is_array($result)) {
        if (isset($result[0]) && is_array($result[0])) {
            $address = $result[0];
        } else {
            $address = $result;
        }
    }
}

// Tính lại phí vận chuyển và tổng cộng theo ship_method
if ($ship_method === 'express') {
    $shipping_cost = 65000;
} else {
    $shipping_cost = 40000;
}
$total_with_shipping = $total + $shipping_cost;

// Xác nhận đặt hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
    $ordersModel = new Orders();
    $orderItemsModel = new OrderItems();
    $cartController = new CartController();

    // Tạo order
    $id_order = $ordersModel->addOrder($id_user, $id_address, $payment_method, $ship_method, 'pending');
    foreach ($cart_items as $item) {
        $orderItemsModel->addOrderItem($id_order, $item['id_product'], $item['quantity'], $item['price']);
    }
    // Xóa cart
    $cartController->clearCart($id_user);

    // Lưu thông tin đơn hàng vào session cho bill.php
    $_SESSION['bill_info'] = [
        'id_order' => $id_order,
        'address' => $address,
        'payment_method' => $payment_method,
        'ship_method' => $ship_method,
        'shipping_cost' => $shipping_cost,
        'total' => $total,
        'total_with_shipping' => $total_with_shipping,
        'cart_items' => $cart_items
    ];

    unset($_SESSION['checkout_info']);
    unset($_SESSION['card_info']);
    unset($_SESSION['card_payment']);
    unset($_SESSION['selected_ship_method']); // Reset ship_method về mặc định sau khi đặt hàng
    header('Location: /WEB_2/cart/success');
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/xacnhan.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
<div class="xacnhan-outer">
    <div class="xacnhan-container">
        <div class="xacnhan-left">
            <h1>Xác nhận đơn hàng</h1>
            <h3>Thông tin sản phẩm</h3>
            <div class="xacnhan-product-list">
                <?php foreach ($cart_items as $item): ?>
                    <div class="xacnhan-product-item">
                        <strong><?php echo htmlspecialchars($item['product_name']); ?></strong>
                        <div>Size: <?php echo htmlspecialchars($item['size']); ?></div>
                        <div>Số lượng: <?php echo $item['quantity']; ?></div>
                        <div>Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</div>
                        <div>Tạm tính: <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> ₫</div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="xacnhan-right">
            <h2>Thông tin giao hàng</h2>
            <div class="xacnhan-info-block">
                <?php if (!empty($address)): ?>
                    <strong>Người nhận:</strong> <?php echo htmlspecialchars($address['recive_name'] ?? ''); ?><br>
                    <strong>Điện thoại:</strong> <?php echo htmlspecialchars($address['phone'] ?? ''); ?><br>
                    <strong>Địa chỉ:</strong> <?php echo htmlspecialchars($address['address'] ?? ''); ?>
                <?php else: ?>
                    <span style="color:red;">Không tìm thấy địa chỉ giao hàng!</span>
                <?php endif; ?>
            </div>
            <div class="xacnhan-info-block">
                <strong>Hình thức giao hàng:</strong> <?php echo $ship_method === 'express' ? 'Hỏa tốc' : 'Chuyển phát thường'; ?><br>
                <strong>Phí vận chuyển:</strong> <?php echo number_format($shipping_cost, 0, ',', '.'); ?> ₫
            </div>
            <div class="xacnhan-info-block">
                <strong>Hình thức thanh toán:</strong> <?php echo $payment_method === 'card' ? 'Thẻ Visa/MasterCard' : 'Thanh toán khi nhận hàng'; ?>
            </div>
            <div class="xacnhan-total-block">
                <strong>Tổng cộng:</strong> <?php echo number_format($total_with_shipping, 0, ',', '.'); ?> ₫
            </div>
            <form method="POST" style="margin-top:20px;">
                <button type="submit" name="confirm_order" class="xacnhan-btn">Xác nhận đặt hàng</button>
            </form>
            <div class="back-to-cart-box">
                <a href="/WEB_2/app/controller/main.php?act=cart" class="continue-shopping">
                    <i class="fa fa-arrow-left"></i> Quay lại giỏ hàng
                </a>
            </div>
            <?php if (isset($_GET['success'])): ?>
                <div style="color:green; font-weight:bold; margin-top:20px;">Đặt hàng thành công!</div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
