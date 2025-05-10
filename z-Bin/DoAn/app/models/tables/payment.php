<?php
include_once 'database.php';
include_once 'users.php';
// Khởi tạo kết nối database
$db = new database();

$table_payment = $db->handle("CREATE TABLE IF NOT EXISTS payment (
    id_payment INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_users INT UNSIGNED NOT NULL,
    payment_method ENUM('by_cash', 'credit') NOT NULL,
    FOREIGN KEY (id_users) REFERENCES user(id_users)
)");
?>