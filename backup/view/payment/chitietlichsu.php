<h2>Chi tiết lịch sử thanh toán</h2>
<?php if (!empty($history)): ?>
    <?php $info = $history[0]; ?>
    <p><strong>Khách hàng:</strong> <?= $info['customer_name'] ?></p>
    <p><strong>Ngày đặt:</strong> <?= $info['order_date'] ?></p>
    <p><strong>Phương thức:</strong> <?= $info['method'] ?></p>
    <p><strong>Ngày thanh toán:</strong> <?= $info['payment_date'] ?></p>
    <p><strong>Số tiền:</strong> <?= number_format($info['amount'], 0, ',', '.') ?> VND</p>

    <h3>Chi tiết đơn hàng:</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history as $item): ?>
            <tr>
                <td><?= $item['product_name'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Không tìm thấy lịch sử thanh toán.</p>
<?php endif; ?>
<a href="index.php?controller=payment_history&action=index">← Quay lại</a>
