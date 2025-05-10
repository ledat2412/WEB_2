<?php 
    include_once "database.php";
    $data_description = new database();

    $description = $data_description->handle("CREATE TABLE IF NOT EXISTS DESCRIPTIONS (
        description_id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        description_content VARCHAR(255) NOT NULL 
    )");


?>