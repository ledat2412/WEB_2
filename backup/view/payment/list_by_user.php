<?php
// Kiểm tra xem danh sách thanh toán có tồn tại không
if (!empty($payments)) {
?>
    <h2>Danh sách thanh toán</h2>
    <table>
        <thead>
            <tr>
                <th>ID Thanh toán</th>
                <th>Phương thức thanh toán</th>
                <th>ID Người dùng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
            <tr>
                <td><?= htmlspecialchars($payment['id_payment']) ?></td>
                <td><?= htmlspecialchars($payment['payment_method']) ?></td>
                <td><?= htmlspecialchars($payment['id_user']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
} else {
    echo "Không có thanh toán nào.";
}
?>
