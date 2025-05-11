<?php
require_once __DIR__ . '/../../model/orders.php';
require_once __DIR__ . '/../../model/order_items.php';

$user_id = $_SESSION['user_id'] ?? null;
$ordersModel = new Orders();
$orderItemsModel = new OrderItems();

$user_orders = [];
if ($user_id) {
    $user_orders = $ordersModel->getOrdersByUser($user_id);
}

// Nếu có id_order trên URL, chỉ hiển thị chi tiết đơn hàng đó
$id_order_detail = isset($_GET['id_order']) ? intval($_GET['id_order']) : null;
$order_detail = null;
$order_items = [];
if ($id_order_detail) {
    foreach ($user_orders as $order) {
        if ($order['id_order'] == $id_order_detail) {
            $order_detail = $order;
            $order_items = $orderItemsModel->getOrderItemsByOrder($id_order_detail);
            break;
        }
    }
}
?>
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
        .order-list-table-wrapper {
            max-width: 100%;
            margin-bottom: 30px;
        }
        .order-list-table-scroll {
            max-height: 350px;
            overflow-y: auto;
            width: 100%;
        }
        .order-list-table {
            min-width: 600px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        h2 {
            color: #ec2a2a;
            text-align: center;
            margin-bottom: 24px;
        }
        .order-detail-box {
            max-width: 600px;
            margin: 40px auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
            font-size: 1.08rem;
            color: #222;
        }
        .order-detail-box h3 {
            color: #ec2a2a;
            text-align: center;
            margin-bottom: 18px;
            font-size: 1.35rem;
            letter-spacing: 1px;
        }
        .order-detail-table-wrapper {
            max-height: 100px;
            overflow-y: auto;
            margin-bottom: 12px;
            border-radius: 6px;
            background: #fafbfc;
            box-shadow: 0 1px 4px rgba(0,0,0,0.03);
        }
        .order-detail-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1.04rem;
        }
        .order-detail-table th, .order-detail-table td {
            border: 1px solid #eee;
            padding: 7px 8px;
            text-align: left;
        }
        .order-detail-table th {
            background: #f5f5f5;
            font-weight: 600;
        }
        .order-detail-table td {
            background: #fff;
        }
        .order-detail-box a {
            display: inline-block;
            margin-top: 18px;
            padding: 7px 22px;
            background: #ec2a2a;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }
        .order-detail-box a:hover {
            background: #b71c1c;
        }
        .order-detail-box b {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="main-content-infor">
        <h2>Đơn hàng của bạn</h2>
        <?php if ($id_order_detail && $order_detail): ?>
            <div class="order-detail-box">
                <h3>Chi tiết hóa đơn #<?php echo htmlspecialchars($order_detail['id_order']); ?></h3>
                <p><b>Ngày đặt:</b> <?php echo htmlspecialchars($order_detail['order_date'] ?? ''); ?></p>
                <p><b>Địa chỉ giao hàng:</b> <?php echo htmlspecialchars($order_detail['shipping_address'] ?? ''); ?></p>
                <p><b>Phương thức vận chuyển:</b> <?php echo htmlspecialchars($order_detail['ship_method'] ?? ''); ?></p>
                <p><b>Phương thức thanh toán:</b> <?php echo htmlspecialchars($order_detail['payment_method'] ?? ''); ?></p>
                <p><b>Trạng thái:</b> <?php echo htmlspecialchars($order_detail['status'] ?? ''); ?></p>
                <h4>Sản phẩm trong đơn hàng:</h4>
                <div class="order-detail-table-wrapper">
                    <table class="order-detail-table">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        foreach ($order_items as $item):
                            $item_total = $item['price'] * $item['quantity'];
                            $total += $item_total;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo number_format($item['price'], 0, ',', '.'); ?>₫</td>
                                <td><?php echo number_format($item_total, 0, ',', '.'); ?>₫</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <p><b>Tổng tiền:</b> <?php echo number_format($total, 0, ',', '.'); ?>₫</p>
                <a href="?">Quay về danh sách đơn hàng</a>
            </div>
        <?php elseif (!empty($user_orders)): ?>
            <div class="order-list-table-wrapper">
                <div class="order-list-table-scroll">
                    <table class="order-list-table">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                        <?php foreach ($user_orders as $order): ?>
                            <tr>
                                <td>
                                    <ul class="order-product-list">
                                        <?php
                                        $items = $orderItemsModel->getOrderItemsByOrder($order['id_order']);
                                        if (!empty($items)) {
                                            $item = $items[0];
                                            ?>
                                            <li>
                                                <?php echo htmlspecialchars($item['product_name']); ?> (x<?php echo $item['quantity']; ?>)
                                                - <?php echo number_format($item['price'], 0, ',', '.'); ?>₫
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td><?php echo htmlspecialchars($order['order_date'] ?? ''); ?></td>
                                <td>
                                    <?php
                                    $total = 0;
                                    foreach ($items as $item) {
                                        $total += $item['price'] * $item['quantity'];
                                    }
                                    echo number_format($total, 0, ',', '.');
                                    ?>₫
                                </td>
                                <td><?php echo htmlspecialchars($order['status'] ?? 'Đã đặt'); ?></td>
                                <td>
                                    <a class="order-detail-link" href="?id_order=<?php echo urlencode($order['id_order']); ?>">Xem chi tiết</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <p>Không có đơn hàng nào.</p>
        <?php endif; ?>
    </div>
</body>
</html>