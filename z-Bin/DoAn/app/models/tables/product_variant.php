<?php 
    include_once "database.php";
    $data_product_variant = new database();

    $product_variant = $data_product_variant->handle("CREATE TABLE IF NOT EXISTS PRODUCT_VARIANT (
        product_variant_id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_variant_name VARCHAR(50) NOT NULL 
    )");


?>