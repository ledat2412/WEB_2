<?php
    include_once "database.php";
    include_once "Users.php";
    include_once "product.php";
    $db = new Database();

    $table_cart = $db -> handle("CREATE TABLE IF NOT EXISTS cart (
    
        id_cart INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_users INT(11) UNSIGNED NOT NULL,
        id_product INT UNSIGNED NOT NULL,
        quantity INT(11) UNSIGNED NOT NULL,

        FOREIGN KEY (id_users) REFERENCES user (id_users),
        FOREIGN KEY (id_product) REFERENCES PRODUCT (product_id)
    
    )")

?>