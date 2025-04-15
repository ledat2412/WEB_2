<?php 
    include_once 'database.php';
    include_once 'roles.php';
    $users = new database();

    $table_users = $users->handle("CREATE TABLE  IF NOT EXISTS THONGTINKHACHHANG (
        id_users INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        gmail VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        phone VARCHAR(12) NOT NULL,
        id_role INT UNSIGNED NOT NULL DEFAULT 0,
        FOREIGN KEY (id_role) REFERENCES roles(id_role)
    )");
?>