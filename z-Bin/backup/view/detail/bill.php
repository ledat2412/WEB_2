<?php
// order_detail.php

// Kiểm tra xem dữ liệu đơn hàng có tồn tại không
if ($orderData) {
?>
    <h2>Thông tin đơn hàng của <?= htmlspecialchars($orderData['username']) ?></h2>
    <div>
        <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($orderData['shipping_address']) ?></p>
        <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($orderData['phone']) ?></p>
        <!-- Thêm các thông tin khác nếu cần -->
    </div>

    <h3>Danh sách sản phẩm</h3>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['product_name']) ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= number_format($item['price']) ?> đ</td>
                <td><?= number_format($item['price'] * $item['quantity']) ?> đ</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4><strong>Tổng tiền:</strong> <?= number_format(array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $items))) ?> đ</h4>

<?php
} else {
    echo "Không tìm thấy đơn hàng.";
}
?>
