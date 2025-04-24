<?php
require_once 'database.php';
require_once 'users.php';
require_once 'product.php';

// Khởi tạo kết nối database
$db = new database();

$table_cart = $db->handle("CREATE TABLE IF NOT EXISTS cart (
    id_cart INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    id_product INT UNSIGNED,
    quantity INT UNSIGNED,
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_product) REFERENCES product(id_product)
)");

class Cart {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addToCart($id_user, $id_product, $quantity) {
        $sql = "INSERT INTO cart (id_user, id_product, quantity) VALUES (?, ?, ?)";
        return $this->db->handle($sql, [$id_user, $id_product, $quantity]);
    }

    public function getCartItem($id) {
        $sql = "SELECT c.*, p.name as product_name, p.price, p.picture_path 
                FROM cart c 
                LEFT JOIN product p ON c.id_product = p.id_product 
                WHERE c.id_cart = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getCartByUser($id_user) {
        $sql = "SELECT c.*, p.name as product_name, p.price, p.picture_path 
                FROM cart c 
                LEFT JOIN product p ON c.id_product = p.id_product 
                WHERE c.id_user = ?";
        $this->db->handle($sql, [$id_user]);
        return $this->db->getData($sql);
    }

    public function updateCartItem($id, $quantity) {
        $sql = "UPDATE cart SET quantity = ? WHERE id_cart = ?";
        return $this->db->handle($sql, [$quantity, $id]);
    }

    public function deleteCartItem($id) {
        $sql = "DELETE FROM cart WHERE id_cart = ?";
        return $this->db->handle($sql, [$id]);
    }

    public function clearCart($id_user) {
        $sql = "DELETE FROM cart WHERE id_user = ?";
        return $this->db->handle($sql, [$id_user]);
    }
}
?> 