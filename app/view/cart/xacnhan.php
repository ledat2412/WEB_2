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

// Lấy thông tin địa chỉ
$addressModel = new Addresses();
$address = $addressModel->getAddressById($id_address);

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
    header('Location: /WEB_2/app/view/cart/bill.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/Web.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Xác nhận đơn hàng</title>
    <style>
        .checkout {
            background: #28a745;
            color: #fff !important;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            opacity: 1 !important;
        }
        .checkout:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .continue-shopping {
            color: #007bff;
            text-decoration: underline;
            background: none;
            border: none;
            padding: 0;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="cart-container">
    <div class="cart-left">
        <h1>Xác nhận đơn hàng</h1>
        <h3>Thông tin sản phẩm</h3>
        <?php foreach ($cart_items as $item): ?>
            <div class="cart-item">
                <div class="item-details">
                    <strong><?php echo htmlspecialchars($item['product_name']); ?></strong>
                    <div>Size: <?php echo htmlspecialchars($item['size']); ?></div>
                    <div>Số lượng: <?php echo $item['quantity']; ?></div>
                    <div>Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</div>
                    <div>Tạm tính: <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> ₫</div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="cart-right">
        <h2>Thông tin giao hàng</h2>
        <div>
            <strong>Người nhận:</strong> <?php echo htmlspecialchars($address['recive_name'] ?? ''); ?><br>
            <strong>Điện thoại:</strong> <?php echo htmlspecialchars($address['phone'] ?? ''); ?><br>
            <strong>Địa chỉ:</strong> <?php echo htmlspecialchars($address['address'] ?? ''); ?>
        </div>
        <div style="margin-top:10px;">
            <strong>Hình thức giao hàng:</strong> <?php echo $ship_method === 'express' ? 'Hỏa tốc' : 'Chuyển phát thường'; ?><br>
            <strong>Phí vận chuyển:</strong> <?php echo number_format($shipping_cost, 0, ',', '.'); ?> ₫
        </div>
        <div style="margin-top:10px;">
            <strong>Hình thức thanh toán:</strong> <?php echo $payment_method === 'card' ? 'Thẻ Visa/MasterCard' : 'Thanh toán khi nhận hàng'; ?>
        </div>
        <div style="margin-top:10px;">
            <strong>Tổng cộng:</strong> <?php echo number_format($total_with_shipping, 0, ',', '.'); ?> ₫
        </div>
        <form method="POST" style="margin-top:20px;">
            <button type="submit" name="confirm_order" class="checkout">Xác nhận đặt hàng</button>
            <a href="/WEB_2/app/view/cart/bill.php" class="continue-shopping" style="margin-left:10px;">DON DAT HANG</a>
        </form>
        <?php if (isset($_GET['success'])): ?>
            <div style="color:green; font-weight:bold; margin-top:20px;">Đặt hàng thành công!</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
