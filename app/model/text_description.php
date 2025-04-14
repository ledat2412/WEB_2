<?php 
    include '../DoAn/app/models/database.php';
    $text_description = new database();

    $text = $text_description->handle("CREATE TABLE TEXT_DESCRIPTION(
        id_text INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        content TEXT NOT NULL 
    )");

?>