<?php
require_once 'database.php';
require_once 'users.php';
require_once 'addresses.php';
require_once 'payments.php';

// Khởi tạo kết nối database
$db = new database();

$table_orders = $db->handle("CREATE TABLE IF NOT EXISTS orders (
    id_order INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(11) UNSIGNED NOT NULL,
    id_address INT UNSIGNED NOT NULL,
    id_payment INT UNSIGNED DEFAULT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_address) REFERENCES addresses(id_address),
    FOREIGN KEY (id_payment) REFERENCES payments(id_payment)
)");

class Orders {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    // Thêm đơn hàng mới
    public function addOrder($id_user, $id_address, $id_payment = null, $status = 'pending') {
       
        $sql = "INSERT INTO orders (id_user, id_address, id_payment, status) VALUES (?, ?, ?, ?)";
        
        $this->db->handle($sql, [$id_user, $id_address, $id_payment, $status]);
        
        return $this->db->lastInsertId();  // Lấy ID của đơn hàng vừa thêm
    }

    // Lấy thông tin đơn hàng theo ID
    public function getOrder($id) {
        $sql = "SELECT o.*, u.username, a.address as shipping_address 
                FROM orders o 
                LEFT JOIN users u ON o.id_user = u.id_users 
                LEFT JOIN addresses a ON o.id_address = a.id_address 
                WHERE o.id_order = ?";
        $this->db->handle($sql, [$id]);
        $order = $this->db->getData($sql);
        if ($order) {
            return $order;
        } else {
            throw new Exception("Không tìm thấy đơn hàng với ID: $id");
        }}

    // Lấy tất cả đơn hàng của người dùng
    public function getOrdersByUser($id_user) {
        $sql = "SELECT o.*, a.address as shipping_address 
                FROM orders o 
                LEFT JOIN addresses a ON o.id_address = a.id_address 
                WHERE o.id_user = ?";
        $this->db->handle($sql, [$id_user]);
        $orders = $this->db->getData($sql);
        if ($orders) {
            return $orders;
        } else {
            throw new Exception("Không có đơn hàng cho người dùng với ID: $id_user");
        }
    }

    // Thêm sản phẩm vào đơn hàng
    public function addOrderItem($order_id, $product_id, $quantity, $price) {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$order_id, $product_id, $quantity, $price]);
    }

    // Lấy các sản phẩm của đơn hàng
    public function getOrderItems($order_id) {
        $sql = "SELECT oi.*, p.product_name 
                FROM order_items oi
                LEFT JOIN products p ON oi.product_id = p.id_product
                WHERE oi.order_id = ?";
        $this->db->handle($sql, [$order_id]);
        return $this->db->getData($sql);
    }
}
?>
