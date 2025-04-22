<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_cart = $db->exec("CREATE TABLE IF NOT EXISTS cart (
    id_cart INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    id_product INT UNSIGNED,
    quantity INT DEFAULT 1,
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_product) REFERENCES product(id_product)
)");

class Cart {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addToCart($id_user, $id_product, $quantity = 1) {
        $sql = "INSERT INTO cart (id_user, id_product, quantity) VALUES (?, ?, ?)";
        return $this->db->exec($sql, [$id_user, $id_product, $quantity]);
    }

    public function getCartItem($id) {
        $sql = "SELECT c.*, p.picture_path, p.price, p.size, 
                co.name as color_name, m.name as material_name, s.name as sex_name
                FROM cart c
                LEFT JOIN product p ON c.id_product = p.id_product
                LEFT JOIN colors co ON p.color_id = co.id
                LEFT JOIN materials m ON p.material_id = m.id
                LEFT JOIN sex s ON p.sex_id = s.id
                WHERE c.id_cart = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getUserCart($id_user) {
        $sql = "SELECT c.*, p.picture_path, p.price, p.size, 
                co.name as color_name, m.name as material_name, s.name as sex_name
                FROM cart c
                LEFT JOIN product p ON c.id_product = p.id_product
                LEFT JOIN colors co ON p.color_id = co.id
                LEFT JOIN materials m ON p.material_id = m.id
                LEFT JOIN sex s ON p.sex_id = s.id
                WHERE c.id_user = ?";
        $this->db->exec($sql, [$id_user]);
        return $this->db->getData();
    }

    public function updateCartItem($id, $quantity) {
        $sql = "UPDATE cart SET quantity = ? WHERE id_cart = ?";
        return $this->db->exec($sql, [$quantity, $id]);
    }

    public function deleteCartItem($id) {
        $sql = "DELETE FROM cart WHERE id_cart = ?";
        return $this->db->exec($sql, [$id]);
    }

    public function clearUserCart($id_user) {
        $sql = "DELETE FROM cart WHERE id_user = ?";
        return $this->db->exec($sql, [$id_user]);
    }
}
?> 