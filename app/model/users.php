<?php 
    include '../DoAn/app/models/database.php';
    include '../DoAn/app/models/roles.php';
    $users = new database();

    $table_users = $users->handle("CREATE TABLE  IF NOT EXISTS USERS (
        id_users INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(50) NOT NULL,
        lastName VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        role TINYINT UNSIGNED NOT NULL DEFAULT 0,
        FOREIGN KEY (role) REFERENCES roles(id_role)
    )");
?>