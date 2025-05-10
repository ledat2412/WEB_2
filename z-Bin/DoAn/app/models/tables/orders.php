<?php
include_once 'database.php';
include_once 'users.php';
include_once 'addresses.php';

// Khởi tạo kết nối database
$db = new database();

$table_order = $db->handle("CREATE TABLE IF NOT EXISTS orders (
    id_order INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_users INT(11) UNSIGNED NOT NULL,
    status ENUM('ordered', 'packed', 'shipping', 'finish') NOT NULL DEFAULT 'ordered',
    address INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (id_users) REFERENCES user(id_users),
    FOREIGN KEY (address) REFERENCES addresses(id_address)
)");
?>