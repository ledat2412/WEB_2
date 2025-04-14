<?php 
    include '../DoAn/app/models/database.php';
    $payments= new database();
    $text = $payments->handle("CREATE TABLE PAYMENTS_ORDERS(
        id_payments INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        dials VARCHAR ( 20 ) NOT NULL,
        address VARCHAR (255 ) NOT NULL,
        menthod_payments INT UNSIGNED AUTO_INCREMENT PRIMARY KEY

    )");
?>