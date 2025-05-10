<?php 
    include '../DoAn/app/models/tables/database.php';
    include '../DoAn/app/models/tables/text_description.php';
    include '../DoAn/app/models/tables/picture.php';
    $product_descrpition = new database();

    $description = $product_descrpition->handle("CREATE TABLE PRODUCT_DESCRIPTION(
        id_product_description INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type_product VARCHAR (50) NOT NULL,
        code_product INT UNSIGNED NOT NULL,
        color_product VARCHAR NOT NULL,
        material_product VARCHAR NOT NULL,
        id_text INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_text) REFERENCES TEXT_DESCRIPTION(id_text),
        id_picture INT UNSIGNED NOT NULL, 
        FOREIGN KEY (id_picture) REFERENCES PICTURES(id_picture),
    )");

?>