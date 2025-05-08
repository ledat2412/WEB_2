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
)");class Cart {
    private $db;

    public function __construct()
    {
        $this->db = new database();
    }
    public function addToCart($id_user, $id_product, $quantity)
     {
    $existItem = $this->checkCartItem($id_user, $id_product);
        if (!empty($existItem)) 
        {
            $id_cart = $existItem[0]['id_cart'];
            $newQuantity = $existItem[0]['quantity'] + $quantity;
            $this->updateCartItem($id_cart, $newQuantity);
        } else 
        {
            $sql = "INSERT INTO cart (id_user, id_product, quantity) VALUES (?, ?, ?)";
            $this->db->handle($sql, [$id_user, $id_product, $quantity]);
        }
    }
public function getCartByUser($id_user) {
        $sql = "SELECT c.*, p.product_name, p.price, p.picture_path 
                FROM cart c 
                LEFT JOIN product p ON c.id_product = p.id_product 
                WHERE c.id_user = ?";
        $stmt = $this->db->handle($sql, [$id_user]);
        return $this->db->getData($stmt);
    }

    public function updateCartItem($id_cart, $quantity) {
        $sql = "UPDATE cart SET quantity = ? WHERE id_cart = ?";
        return $this->db->handle($sql, [$quantity, $id_cart]);
    }

    public function deleteCartItem($id_cart) {
        $sql = "DELETE FROM cart WHERE id_cart = ?";
        return $this->db->handle($sql, [$id_cart]);
    }

    public function clearCart($id_user) {
        $sql = "DELETE FROM cart WHERE id_user = ?";
        return $this->db->handle($sql, [$id_user]);
    }

    public function checkCartItem($id_user, $id_product) {
        $sql = "SELECT * FROM cart WHERE id_user = ? AND id_product = ?";
        $stmt = $this->db->handle($sql, [$id_user, $id_product]);
        return $this->db->getData($stmt);
    }
}
?>