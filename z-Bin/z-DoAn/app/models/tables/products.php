<?php 
    include '../DoAn/app/models/tables/database.php';
    $product = new database();

    $products = $product->handle("CREATE TABLE IF NOT EXISTS PRODUCTS(
        id_product INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name_product VARCHAR(50) NOT NULL,
        price_product VARCHAR(50) NOT NULL,
        quantities_product INT UNSIGNED NOT NULL,
        size_product VARCHAR(50) NOT NULL,
        id_product_descripts INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_product_descripts) REFERENCES PRODUCT_DESCRIPTION(id_product_descripts)
    )");

?>