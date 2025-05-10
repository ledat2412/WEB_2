<?php 
    include_once 'database.php';
    $roles = new database();

    $table_role = $roles -> handle("CREATE TABLE IF NOT EXISTS ROLES(
        id_role INT UNSIGNED PRIMARY KEY,
        name_role VARCHAR(50) NOT NULL
    )");

    $insert_role = $roles -> handle("INSERT IGNORE INTO ROLES(id_role, name_role) VALUES (0, 'user'), (1, 'admin')");
?>  
