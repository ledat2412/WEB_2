<?php 
    include '../DoAn/app/models/database.php';
    $roles = new database();

    $table_role = $roles -> handle("CREATE TABLE ROLES(
        id_role INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name_role VARCHAR(50) NOT NULL
    )");

    $insert_role = $roles -> handle("INSERT INTO ROLE(id_role, name_role) VALUES (0, 'user'), (1, 'admin')");
?>
