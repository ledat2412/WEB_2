<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_product_variants = $db->exec("CREATE TABLE IF NOT EXISTS product_variants (
    id_variant INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_product INT UNSIGNED NOT NULL,
    size VARCHAR(20) DEFAULT NULL,
    color_id INT UNSIGNED DEFAULT NULL,
    material_id INT UNSIGNED DEFAULT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock_quantity INT UNSIGNED NOT NULL DEFAULT 0,
    FOREIGN KEY (id_product) REFERENCES product(id_product),
    FOREIGN KEY (color_id) REFERENCES colors(id),
    FOREIGN KEY (material_id) REFERENCES materials(id)
)");

class ProductVariants {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addVariant($id_product, $size, $color_id, $material_id, $price, $stock_quantity) {
        $sql = "INSERT INTO product_variants (id_product, size, color_id, material_id, price, stock_quantity) 
                VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->exec($sql, [$id_product, $size, $color_id, $material_id, $price, $stock_quantity]);
    }

    public function getVariant($id) {
        $sql = "SELECT * FROM product_variants WHERE id_variant = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getVariantsByProduct($id_product) {
        $sql = "SELECT pv.*, c.name as color_name, m.name as material_name 
                FROM product_variants pv
                LEFT JOIN colors c ON pv.color_id = c.id
                LEFT JOIN materials m ON pv.material_id = m.id
                WHERE pv.id_product = ?";
        $this->db->exec($sql, [$id_product]);
        return $this->db->getData();
    }

    public function updateVariant($id, $size, $color_id, $material_id, $price, $stock_quantity) {
        $sql = "UPDATE product_variants SET size = ?, color_id = ?, material_id = ?, 
                price = ?, stock_quantity = ? WHERE id_variant = ?";
        return $this->db->exec($sql, [$size, $color_id, $material_id, $price, $stock_quantity, $id]);
    }

    public function updateStock($id, $quantity) {
        $sql = "UPDATE product_variants SET stock_quantity = ? WHERE id_variant = ?";
        return $this->db->exec($sql, [$quantity, $id]);
    }

    public function deleteVariant($id) {
        $sql = "DELETE FROM product_variants WHERE id_variant = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 