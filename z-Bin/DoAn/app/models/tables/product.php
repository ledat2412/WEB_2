<?php 
    include_once "database.php";
    include_once "color.php";
    include_once "material.php";
    include_once "description.php";
    include_once "sex.php";
    include_once "product_variant.php";
    $data_product = new database();

    $product = $data_product->handle("CREATE TABLE IF NOT EXISTS PRODUCT (
        product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        size INT NOT NULL,
        picture_path VARCHAR(255) NOT NULL,
        price INT(7) NOT NULL,
        stock INT(3) NOT NULL,
        color_id INT(4) UNSIGNED NOT NULL,
        FOREIGN KEY (color_id) REFERENCES COLORS(color_id),
        material_id INT(2) UNSIGNED NOT NULL,
        FOREIGN KEY (material_id) REFERENCES MATERIALS(material_id),
        sex_id INT(1) UNSIGNED NOT NULL,
        FOREIGN KEY (sex_id) REFERENCES SEX(sex_id),
        product_variant_id INT(1) UNSIGNED NOT NULL,
        FOREIGN KEY (product_variant_id) REFERENCES PRODUCT_VARIANT(product_variant_id),
        description_id INT(3) UNSIGNED NOT NULL,
        FOREIGN KEY (description_id) REFERENCES DESCRIPTIONS(description_id)
    )");

    $add_column = $data_product->handle("ALTER TABLE PRODUCT ADD COLUMN IF NOT EXISTS product_name VARCHAR(255) NOT NULL;");
?>