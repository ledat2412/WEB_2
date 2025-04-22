<?php
    include_once "database.php";
    include_once "roles.php";
    $db = new database();

    $tabel_user = $db->handle("CREATE TABLE IF NOT EXISTS user (
        id_users INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(100) NOT NULL,
        role TINYINT(4) UNSIGNED NOT NULL,
        FOREIGN KEY (role) REFERENCES roles(id_role)
    )");
?>