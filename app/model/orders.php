<?php
include '../DoAn/app/models/database.php';
include '../DoAn/app/models/id_users.php';
include '../DoAn/app/models/id_payments.php';
$orders= new database();
    $text = $orders->handle("CREATE TABLE PAYMENTS_ORDERS(
        id_orders INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_users INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_users) REFERENCES USERS(id_users), 
        id_payments INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_payments) REFERENCES PAYMENTS(id_payments),
        orders_date DATE NOT NULL
        status TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        total_prices DECIMAL(10,2) NOT NULL,

    )");
?>