<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_cart = $db->exec("CREATE TABLE IF NOT EXISTS cart (
    id_cart INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    id_variant INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL DEFAULT 1,
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_variant) REFERENCES product_variants(id_variant)
)");

class Cart {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addToCart($id_user, $id_variant, $quantity = 1) {
        // Check if item already exists in cart
        $sql = "SELECT * FROM cart WHERE id_user = ? AND id_variant = ?";
        $this->db->exec($sql, [$id_user, $id_variant]);
        $existing = $this->db->getData();

        if ($existing) {
            // Update quantity if item exists
            $new_quantity = $existing[0]['quantity'] + $quantity;
            $sql = "UPDATE cart SET quantity = ? WHERE id_cart = ?";
            return $this->db->exec($sql, [$new_quantity, $existing[0]['id_cart']]);
        } else {
            // Add new item to cart
            $sql = "INSERT INTO cart (id_user, id_variant, quantity) VALUES (?, ?, ?)";
            return $this->db->exec($sql, [$id_user, $id_variant, $quantity]);
        }
    }

    public function getCartItems($id_user) {
        $sql = "SELECT c.*, pv.price, p.name as product_name, pv.size, 
                col.name as color_name, m.name as material_name
                FROM cart c
                JOIN product_variants pv ON c.id_variant = pv.id_variant
                JOIN product p ON pv.id_product = p.id_product
                LEFT JOIN colors col ON pv.color_id = col.id
                LEFT JOIN materials m ON pv.material_id = m.id
                WHERE c.id_user = ?";
        $this->db->exec($sql, [$id_user]);
        return $this->db->getData();
    }

    public function updateCartItem($id_cart, $quantity) {
        $sql = "UPDATE cart SET quantity = ? WHERE id_cart = ?";
        return $this->db->exec($sql, [$quantity, $id_cart]);
    }

    public function removeFromCart($id_cart) {
        $sql = "DELETE FROM cart WHERE id_cart = ?";
        return $this->db->exec($sql, [$id_cart]);
    }

    public function clearCart($id_user) {
        $sql = "DELETE FROM cart WHERE id_user = ?";
        return $this->db->exec($sql, [$id_user]);
    }

    public function getCartTotal($id_user) {
        $sql = "SELECT SUM(c.quantity * pv.price) as total
                FROM cart c
                JOIN product_variants pv ON c.id_variant = pv.id_variant
                WHERE c.id_user = ?";
        $this->db->exec($sql, [$id_user]);
        $result = $this->db->getData();
        return $result[0]['total'] ?? 0;
    }
}
?> 