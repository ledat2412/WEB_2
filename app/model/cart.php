<?php
require_once 'database.php';
require_once 'product.php';
require_once 'users.php';

class Cart {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Tạo bảng cart nếu chưa có
     */
    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS cart (
            id_cart INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_user INT UNSIGNED NOT NULL,
            id_product INT UNSIGNED,
            quantity INT UNSIGNED,
            size VARCHAR(10),
            FOREIGN KEY (id_user) REFERENCES users(id_users),
            FOREIGN KEY (id_product) REFERENCES product(id_product)
        )";
        return $this->db->handle($sql);
    }

    /**
     * Thêm sản phẩm vào giỏ hàng.
     * Nếu sản phẩm đã có trong giỏ thì cộng dồn số lượng.
     */
    public function addToCart($id_user, $id_product, $quantity) {
        if ($quantity < 1) return false;

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $existItem = $this->checkCartItem($id_user, $id_product);
        if (!empty($existItem)) {
            // Nếu có rồi, cộng dồn số lượng
            $currentQty = $existItem[0]['quantity'];
            $newQuantity = $currentQty + $quantity;
            return $this->updateQuantityByUserAndProduct($id_user, $id_product, $newQuantity);
        } else {
            // Nếu chưa có thì thêm mới sản phẩm vào giỏ hàng
            $sql = "INSERT INTO cart (id_user, id_product, quantity) VALUES (?, ?, ?)";
            return $this->db->handle($sql, [$id_user, $id_product, $quantity]);
        }
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ.
     * Nếu số lượng <= 0 thì xóa sản phẩm khỏi giỏ.
     */
    public function updateQuantityByUserAndProduct($id_user, $id_product, $quantity) {
        if ($quantity <= 0) {
            return $this->deleteCartItemByProduct($id_user, $id_product);
        }

        $sql = "UPDATE cart SET quantity = ? WHERE id_user = ? AND id_product = ?";
        return $this->db->handle($sql, [$quantity, $id_user, $id_product]);
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng theo id_cart.
     */
    public function deleteCartItem($id_cart) {
        $sql = "DELETE FROM cart WHERE id_cart = ?";
        return $this->db->handle($sql, [$id_cart]);
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng theo id_user và id_product.
     */
    public function deleteCartItemByProduct($id_user, $id_product) {
        $sql = "DELETE FROM cart WHERE id_user = ? AND id_product = ?";
        return $this->db->handle($sql, [$id_user, $id_product]);
    }

    /**
     * Xóa toàn bộ giỏ hàng của người dùng.
     */
    public function clearCart($id_user) {
        $sql = "DELETE FROM cart WHERE id_user = ?";
        return $this->db->handle($sql, [$id_user]);
    }

    /**
     * Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa.
     */
    public function checkCartItem($id_user, $id_product) {
        $sql = "SELECT * FROM cart WHERE id_user = ? AND id_product = ?";
        $stmt = $this->db->handle($sql, [$id_user, $id_product]);
        return $this->db->getData($stmt);
    }

    /**
     * Lấy toàn bộ giỏ hàng của người dùng.
     */
    public function getCartByUser($id_user) {
        $sql = "SELECT c.*, p.product_name, p.price, p.picture_path, p.size 
                FROM cart c 
                LEFT JOIN product p ON c.id_product = p.id_product 
                WHERE c.id_user = ?";
        $stmt = $this->db->handle($sql, [$id_user]);
        return $this->db->getData($stmt);
    }

    /**
     * Tính tổng tiền giỏ hàng.
     */
    public function calculateTotal($id_user) {
        $sql = "SELECT SUM(c.quantity * p.price) AS total 
                FROM cart c 
                JOIN product p ON c.id_product = p.id_product 
                WHERE c.id_user = ?";
        $stmt = $this->db->handle($sql, [$id_user]);
        $result = $this->db->getData($stmt);
        return $result[0]['total'];
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ theo id_cart (MVC form)
     */
    public function updateQuantityByIdCart($id_cart, $quantity) {
        if ($quantity <= 0) {
            $sql = "DELETE FROM cart WHERE id_cart = ?";
            return $this->db->handle($sql, [$id_cart]);
        }
        $sql = "UPDATE cart SET quantity = ? WHERE id_cart = ?";
        return $this->db->handle($sql, [$quantity, $id_cart]);
    }
}
?>