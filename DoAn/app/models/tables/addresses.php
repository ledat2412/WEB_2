<?php
    include_once "database.php";
    include_once "users.php";
    $db = new Database();

    $table_addresses = $db -> handle("CREATE TABLE IF NOT EXISTS addresses (
    
        id_address INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_users INT(11) UNSIGNED NOT NULL,
        phone VARCHAR(50) NOT NULL,
        address VARCHAR(50) NOT NULL,

        FOREIGN KEY (id_users) REFERENCES user (id_users)
    )")

?>