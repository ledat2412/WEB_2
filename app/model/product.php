<?php
require_once 'database.php';
require_once 'colors.php';
require_once 'materials.php';
require_once 'sex.php';
require_once 'product_variant.php';
require_once 'descriptions.php';

// Khởi tạo kết nối database
$db = new database();

$table_product = $db->handle("CREATE TABLE IF NOT EXISTS product (
    id_product INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255),
    shoe_code VARCHAR(255),
    size VARCHAR(20),
    picture_path VARCHAR(255),
    price INT UNSIGNED,
    stock INT UNSIGNED,
    color_id INT UNSIGNED,
    material_id INT UNSIGNED,
    sex_id INT UNSIGNED,
    id_product_variant INT UNSIGNED,
    description_id INT UNSIGNED,
    FOREIGN KEY (color_id) REFERENCES colors(id_color),
    FOREIGN KEY (material_id) REFERENCES materials(id_material),
    FOREIGN KEY (sex_id) REFERENCES sex(id_sex),
    FOREIGN KEY (id_product_variant) REFERENCES product_variant(id_product_variant),
    FOREIGN KEY (description_id) REFERENCES descriptions(id_description)
)");

class Product {
    private $db;

    public function __construct() {
        $this->db = new database();
    }
    
    public function addProduct($product_name, $shoe_code, $size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id) {
        // Đảm bảo đường dẫn ảnh bắt đầu từ thư mục assets
        if (!empty($picture_path) && strpos($picture_path, 'assets/') !== 0) {
            $picture_path = 'assets/' . $picture_path;
        }
        
        $sql = "INSERT INTO product (product_name, shoe_code, size, picture_path, price, stock, color_id, material_id, sex_id, id_product_variant, description_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->handle($sql, [$product_name, $shoe_code, $size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id]);
    }

    public function getProduct($id) {
        $sql = "SELECT p.*, c.name as color_name, m.name as material_name, 
                s.name as sex_name, pv.name as variant_name, d.content as description,
                GROUP_CONCAT(DISTINCT p2.size) as available_sizes
                FROM product p 
                LEFT JOIN colors c ON p.color_id = c.id_color 
                LEFT JOIN materials m ON p.material_id = m.id_material 
                LEFT JOIN sex s ON p.sex_id = s.id_sex 
                LEFT JOIN product_variant pv ON p.id_product_variant = pv.id_product_variant 
                LEFT JOIN descriptions d ON p.description_id = d.id_description 
                LEFT JOIN product p2 ON p.shoe_code = p2.shoe_code
                WHERE p.id_product = '$id'
                GROUP BY p.id_product";
        return $this->db->getData($sql);
    }

    public function getAllProducts() {
        $sql = "SELECT p.*, c.name as color_name, m.name as material_name, 
                s.name as sex_name, pv.name as variant_name, d.content as description 
                FROM product p 
                LEFT JOIN colors c ON p.color_id = c.id_color 
                LEFT JOIN materials m ON p.material_id = m.id_material 
                LEFT JOIN sex s ON p.sex_id = s.id_sex 
                LEFT JOIN product_variant pv ON p.id_product_variant = pv.id_product_variant 
                LEFT JOIN descriptions d ON p.description_id = d.id_description";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateProduct($id, $product_name, $shoe_code, $size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id) {
        // Đảm bảo đường dẫn ảnh bắt đầu từ thư mục assets
        if (!empty($picture_path) && strpos($picture_path, 'assets/') !== 0) {
            $picture_path = 'assets/' . $picture_path;
        }

        $sql = "UPDATE product SET product_name = ?, shoe_code = ?, size = ?, picture_path = ?, price = ?, stock = ?, 
                color_id = ?, material_id = ?, sex_id = ?, id_product_variant = ?, description_id = ? 
                WHERE id_product = ?";
        return $this->db->handle($sql, [$product_name, $shoe_code, $size, $picture_path, $price, $stock, $color_id, $material_id, $sex_id, $id_product_variant, $description_id, $id]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE id_product = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 