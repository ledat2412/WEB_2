<?php 
    include_once "database.php";
    $data_material = new database();

    $color = $data_material->handle("CREATE TABLE IF NOT EXISTS MATERIALS (
        material_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        material_name VARCHAR(50) NOT NULL 
    )");


?>