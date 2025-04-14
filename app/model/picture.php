<?php 
    include '../DoAn/app/models/database.php';
    $pictures = new database();
    
    $picture = $pictures->handle("CREATE TABLE PICTURES(
        id_picture INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        path_picture VARCHAR(255) NOT NULL,
        alt_picture VARCHAR(255) NOT NULL
    )");

?>