<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_product = $db->exec("CREATE TABLE IF NOT EXISTS product (
    id_product INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    size VARCHAR(20) DEFAULT NULL,
    picture_path VARCHAR(255) DEFAULT NULL,
    price INT NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    color_id INT UNSIGNED DEFAULT NULL,
    material_id INT UNSIGNED DEFAULT NULL,
    sex_id INT UNSIGNED DEFAULT NULL,
    id_product_variant INT UNSIGNED DEFAULT NULL,
    description_id INT UNSIGNED DEFAULT NULL,
    FOREIGN KEY (color_id) REFERENCES colors(id),
    FOREIGN KEY (material_id) REFERENCES materials(id),
    FOREIGN KEY (sex_id) REFERENCES sex(id),
    FOREIGN KEY (id_product_variant) REFERENCES product_variant(id_product_variant),
    FOREIGN KEY (description_id) REFERENCES descriptions(id)
)");

class Product {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addProduct($size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id) {
        $sql = "INSERT INTO product (size, picture_path, price, stock, color_id, material_id, sex_id, id_product_variant, description_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->exec($sql, [$size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id]);
    }

    public function getProduct($id) {
        $sql = "SELECT p.*, c.name as color_name, m.name as material_name, 
                s.name as sex_name, pv.name as variant_name, d.content as description
                FROM product p
                LEFT JOIN colors c ON p.color_id = c.id
                LEFT JOIN materials m ON p.material_id = m.id
                LEFT JOIN sex s ON p.sex_id = s.id
                LEFT JOIN product_variant pv ON p.id_product_variant = pv.id_product_variant
                LEFT JOIN descriptions d ON p.description_id = d.id
                WHERE p.id_product = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllProducts() {
        $sql = "SELECT p.*, c.name as color_name, m.name as material_name, 
                s.name as sex_name, pv.name as variant_name, d.content as description
                FROM product p
                LEFT JOIN colors c ON p.color_id = c.id
                LEFT JOIN materials m ON p.material_id = m.id
                LEFT JOIN sex s ON p.sex_id = s.id
                LEFT JOIN product_variant pv ON p.id_product_variant = pv.id_product_variant
                LEFT JOIN descriptions d ON p.description_id = d.id";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateProduct($id, $size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id) {
        $sql = "UPDATE product SET size = ?, picture_path = ?, price = ?, stock = ?, 
                color_id = ?, material_id = ?, sex_id = ?, id_product_variant = ?, description_id = ? 
                WHERE id_product = ?";
        return $this->db->exec($sql, [$size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id, $id]);
    }

    public function updateStock($id, $stock) {
        $sql = "UPDATE product SET stock = ? WHERE id_product = ?";
        return $this->db->exec($sql, [$stock, $id]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE id_product = ?";
        return $this->db->exec($sql, [$id]);
    }

    public function getProductsByVariant($variant_id) {
        $sql = "SELECT p.*, c.name as color_name, m.name as material_name, 
                s.name as sex_name, pv.name as variant_name, d.content as description
                FROM product p
                LEFT JOIN colors c ON p.color_id = c.id
                LEFT JOIN materials m ON p.material_id = m.id
                LEFT JOIN sex s ON p.sex_id = s.id
                LEFT JOIN product_variant pv ON p.id_product_variant = pv.id_product_variant
                LEFT JOIN descriptions d ON p.description_id = d.id
                WHERE p.id_product_variant = ?";
        $this->db->exec($sql, [$variant_id]);
        return $this->db->getData();
    }
}
?> 