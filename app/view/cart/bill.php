<?php
session_start();

// Lấy thông tin user từ session nếu có
$user = $_SESSION['user'] ?? [];
$username = $user['username'] ?? '';
$email = $user['email'] ?? '';
$phone = $user['phone'] ?? '';

// Lấy thông tin đơn hàng từ session bill_info (được lưu từ xacnhan.php)
if (empty($_SESSION['bill_info'])) {
    echo "Không có thông tin đơn hàng để hiển thị.";
    exit;
}
$bill = $_SESSION['bill_info'];
$address = $bill['address'];
$payment_method = $bill['payment_method'];
$ship_method = $bill['ship_method'];
$shipping_cost = $bill['shipping_cost'];
$total = $bill['total'];
$total_with_shipping = $bill['total_with_shipping'];
$cart_items = $bill['cart_items'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="/WEB_2/public/assets/css/Web.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; }
        .bill-container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); padding: 32px; }
        .bill-title { text-align: center; color: #28a745; margin-bottom: 30px; }
        .bill-section { margin-bottom: 30px; }
        .bill-section h3 { color: #333; margin-bottom: 15px; }
        .bill-info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .bill-info-table th, .bill-info-table td { border: 1px solid #eee; padding: 10px; text-align: left; }
        .bill-info-table th { background: #f5f5f5; }
        .bill-summary { font-size: 1.1rem; }
        .bill-summary p { margin: 6px 0; }
        .bill-buttons { margin-top: 24px; display: flex; gap: 12px; justify-content: flex-end; }
        .bill-btn { padding: 8px 20px; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer; }
        .bill-btn-back { background: #f1f1f1; color: #333; border: 1px solid #ccc; }
        .bill-btn-home { background: #28a745; color: #fff; }
        @media (max-width: 700px) {
            .bill-container { padding: 10px; }
            .bill-info-table th, .bill-info-table td { font-size: 0.95rem; }
        }
    </style>
</head>
<body>
<div class="bill-container">
    <h2 class="bill-title">Đơn hàng của bạn</h2>

    <div class="bill-section">
        <h3>Thông tin giao hàng</h3>
        <p><strong>Họ và tên:</strong> <?php echo htmlspecialchars($address['recive_name'] ?? $username); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($address['email'] ?? $email); ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($address['phone'] ?? $phone); ?></p>
        <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($address['address'] ?? ''); ?></p>
        <p><strong>Hình thức giao hàng:</strong> <?php echo $ship_method === 'express' ? 'Hỏa tốc' : 'Chuyển phát thường'; ?></p>
        <p><strong>Hình thức thanh toán:</strong> <?php echo $payment_method === 'card' ? 'Thẻ Visa/MasterCard' : 'Thanh toán khi nhận hàng'; ?></p>
    </div>

    <div class="bill-section">
        <h3>Danh sách sản phẩm</h3>
        <table class="bill-info-table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tạm tính</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                <tr>
                    <td>
                        <?php if (!empty($item['picture_path'])): ?>
                            <img src="<?php echo htmlspecialchars($item['picture_path']); ?>" alt="" width="60">
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($item['size']); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</td>
                    <td><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> ₫</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="bill-summary">
            <p><strong>Phí vận chuyển:</strong> <?php echo number_format($shipping_cost, 0, ',', '.'); ?> ₫</p>
            <p><strong>Tổng cộng:</strong> <?php echo number_format($total_with_shipping, 0, ',', '.'); ?> ₫</p>
        </div>
    </div>

    <div class="bill-buttons">
        <a href="/WEB_2/cart"><button class="bill-btn bill-btn-back">Quay lại giỏ hàng</button></a>
        <a href="/WEB_2"><button class="bill-btn bill-btn-home">Về trang chủ</button></a>
    </div>
</div>
</body>
</html>
