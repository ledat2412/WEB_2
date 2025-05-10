<?php
include_once 'database.php';
include_once 'orders.php';
include_once 'payment.php';
// Khởi tạo kết nối database
$db = new database();

$table_payment_history = $db->handle("CREATE TABLE IF NOT EXISTS payment_history (
    id_payment_history INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_payment INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_payment) REFERENCES payment (id_payment),
    id_order INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_order) REFERENCES orders (id_order)
)");
?>