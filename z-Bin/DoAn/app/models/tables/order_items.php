<?php
include_once 'database.php';
include_once 'product.php';
include_once 'orders.php';

// Khởi tạo kết nối database
$db = new database();

$table_order_items = $db->handle("CREATE TABLE IF NOT EXISTS order_items (
    id_order_items INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_order INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_order) REFERENCES orders (id_order),
    id_product INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_product) REFERENCES PRODUCT (product_id),
    quantity INT(11) UNSIGNED NOT NULL,
    price INT UNSIGNED NOT NULL
)");
?>