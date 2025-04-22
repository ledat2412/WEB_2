<?php 
    include_once "database.php";
    $data_color = new database();

    $color = $data_color->handle("CREATE TABLE IF NOT EXISTS COLORS (
        color_id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        color_name VARCHAR(50) NOT NULL 
    )");


?>