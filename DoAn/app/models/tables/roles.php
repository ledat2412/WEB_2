<?php
    include_once "database.php";

    $db = new database();

    $table_role = $db -> handle("CREATE TABLE IF NOT EXISTS roles (
    
        id_role TINYINT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        role_name VARCHAR(50) NOT NULL
    
    )")
?>