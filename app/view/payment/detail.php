<?php
// Kiểm tra xem dữ liệu thanh toán có tồn tại không
if ($payment) {
?>
    <h2>Chi tiết thanh toán</h2>
    <div>
        <p><strong>ID Thanh toán:</strong> <?= htmlspecialchars($payment['id_payment']) ?></p>
        <p><strong>Phương thức thanh toán:</strong> <?= htmlspecialchars($payment['payment_method']) ?></p>
        <p><strong>ID Người dùng:</strong> <?= htmlspecialchars($payment['id_user']) ?></p>
    </div>
<?php
} else {
    echo "Không tìm thấy thông tin thanh toán.";
}
?>
