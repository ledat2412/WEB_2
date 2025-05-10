<?php
    include '../DoAn/app/models/tables/database.php';
    include '../DoAn/app/models/tables/id_orders.php';
    include '../DoAn/app/models/tables/id_prods.php';
    $orders_details= new database();
    $text = $orders_details->handle("CREATE TABLE PAYMENTS_ORDERS(
        id_orders_details INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_orders INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_orders) REFERENCES ORDERS (id_orders), 
        id_prods INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_prods) REFERENCES PRODUCTS(id_prods),
        orders_date DATE NOT NULL
        quantities INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        unti_prices DECIMAL(10,2) NOT NULL,
    )");
?>