<?php 
    include '../DoAn/app/models/database.php';
    include '../DoAn/app/models/users.php';
    include '../DoAn/app/models/products.php';
    $shopcart = new database();

    $table_shopcart = $shopcart->handle("CREATE TABLE IF NOT EXISTS SHOPCART(
        id_shopcart INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_product INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_product) REFERENCES PRODUCTS (id_product),
        id_users INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_users) REFERENCES USERS (id_users),
        quantities INT UNSIGNED NOT NULL DEFAULT 1
    )");
?>