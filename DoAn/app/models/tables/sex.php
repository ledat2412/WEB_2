<?php 
    include_once "database.php";
    $data_sex = new database();

    $sex = $data_sex->handle("CREATE TABLE IF NOT EXISTS SEX (
        sex_id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sex_name VARCHAR(50) NOT NULL 
    )");


?>