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
    id_address INT(11) UNSIGNED NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_address) REFERENCES addresses(id_address)
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
       //reurn $this->getLastInsertId();  // Lấy ID của đơn hàng vừa tạo
    }

    // Lấy đơn hàng theo ID
    public function getOrder($id) {
        $sql = "SELECT o.*, u.username, a.address AS shipping_address 
                FROM orders o 
                LEFT JOIN users u ON o.id_user = u.id_users 
                LEFT JOIN addresses a ON o.id_address = a.id_address 
                WHERE o.id_order = ?";
        $this->db->handle($sql, [$id]);
        $order = $this->db->getData($sql);  // Trả về dữ liệu chi tiết đơn hàng
        if ($order) {
            return $order;
        } else {
            throw new Exception("Không tìm thấy đơn hàng với ID: $id");
        }
    }

    // Lấy danh sách đơn hàng của người dùng
    public function getOrdersByUser($id_user) {
        $sql = "SELECT o.*, a.address AS shipping_address 
                FROM orders o 
                LEFT JOIN addresses a ON o.id_address = a.id_address 
                WHERE o.id_user = ?";
        $this->db->handle($sql, [$id_user]);
        $orders = $this->db->getData($sql);  // Trả về danh sách đơn hàng
        if ($orders) {
            return $orders;
        } else {
            throw new Exception("Không có đơn hàng cho người dùng với ID: $id_user");
        }
    }

    // Lấy danh sách các sản phẩm trong một đơn hàng
    public function getOrderItems($order_id) {
        $sql = "SELECT oi.*, p.product_name 
                FROM order_items oi
                LEFT JOIN products p ON oi.product_id = p.id_product
                WHERE oi.order_id = ?";
        $this->db->handle($sql, [$order_id]);
        return $this->db->getData($sql);  // Trả về danh sách sản phẩm trong đơn hàng
    }

    // Thêm sản phẩm vào đơn hàng
    public function addOrderItem($order_id, $product_id, $quantity, $price) {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$order_id, $product_id, $quantity, $price]);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($order_id, $status) {
        $sql = "UPDATE orders SET status = ? WHERE id_order = ?";
        return $this->db->handle($sql, [$status, $order_id]);
    }



    // Xóa đơn hàng
    public function deleteOrder($id_order) {
        $sql = "DELETE FROM orders WHERE id_order = ?";
        return $this->db->handle($sql, [$id_order]);
    }
    public function getOrderById($orderId) {
        require 'db_connect.php';
        $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>