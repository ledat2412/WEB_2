<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        .order-list-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .order-list-table th, .order-list-table td { border: 1px solid #eee; padding: 8px; }
        .order-list-table th { background: #f5f5f5; }
        .order-product-list { margin: 0; padding-left: 18px; }
        .order-product-list li { margin-bottom: 4px; }
        .order-detail-link {
            display: inline-block;
            padding: 5px 12px;
            background: #28a745;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.95rem;
            margin-left: 8px;
        }
        .order-detail-link:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="main-content-infor">
        <h2>Đơn hàng của bạn</h2>
        <?php
        // Lấy danh sách đơn hàng từ session (ưu tiên session, không dùng biến $orders cũ)
        $user_orders = $_SESSION['user_orders'] ?? [];
        ?>
        <?php if (!empty($user_orders)): ?>
            <table class="order-list-table">
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Sản phẩm</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
                <?php foreach ($user_orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id_order']); ?></td>
                        <td>
                            <ul class="order-product-list">
                                <?php foreach ($order['cart_items'] as $item): ?>
                                    <li>
                                        <?php echo htmlspecialchars($item['product_name']); ?> (x<?php echo $item['quantity']; ?>)
                                        - <?php echo number_format($item['price'], 0, ',', '.'); ?>₫
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td><?php echo htmlspecialchars($order['order_time'] ?? ''); ?></td>
                        <td><?php echo number_format($order['total_with_shipping'], 0, ',', '.'); ?>₫</td>
                        <td>Đã đặt</td>
                        <td>
                            <a class="order-detail-link" href="/WEB_2/app/view/cart/bill.php?id_order=<?php echo urlencode($order['id_order']); ?>">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Không có đơn hàng nào.</p>
        <?php endif; ?>
    </div>
</body>
</html>