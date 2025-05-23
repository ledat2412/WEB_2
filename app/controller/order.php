<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'database.php';
require_once 'users.php';
require_once 'addresses.php';
// require_once 'payments.php';

// Khởi tạo kết nối database
$db = new database();

$table_orders = $db->handle("CREATE TABLE IF NOT EXISTS orders (
    id_order INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(11) UNSIGNED NOT NULL,
    id_address INT(11) UNSIGNED NOT NULL,
    ship_method ENUM('standard', 'express') NOT NULL DEFAULT 'standard',
    payment_method ENUM('cash', 'card') NOT NULL DEFAULT 'cash',
    status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_address) REFERENCES addresses(id_address)
)");
class Orders {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    // Thêm đơn hàng mới
    public function addOrder($id_user, $id_address, $payment_method = 'cash', $ship_method = 'standard', $status = 'pending') {
        $sql = "INSERT INTO orders (id_user, id_address, payment_method, ship_method, status) VALUES (?, ?, ?, ?, ?)";
        $this->db->handle($sql, [$id_user, $id_address, $payment_method, $ship_method, $status]);
        return $this->getLastInsertId();
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
            // Trả về mảng rỗng thay vì ném exception
            return [];
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
    public function addOrderItem($id_order, $id_product, $quantity, $price) {
        $sql = "INSERT INTO order_items (id_order, id_product, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$id_order, $id_product, $quantity, $price]);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($order_id, $status) {
        $sql = "UPDATE orders SET status = ? WHERE id_order = ?";
        return $this->db->handle($sql, [$status, $order_id]);
    }

    // Lấy ID của đơn hàng vừa được thêm
    public function getLastInsertId() {
        return $this->db->lastInsertId();  // Lấy ID của đơn hàng vừa thêm
    }

    // Xóa đơn hàng
    public function deleteOrder($id_order) {
        $sql = "DELETE FROM orders WHERE id_order = ?";
        return $this->db->handle($sql, [$id_order]);
    }
    public function viewDetail() {
        session_start();

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            echo "Vui lòng đăng nhập để xem đơn hàng.";
            exit;
        }

        if (!isset($_GET['id_order'])) {
            echo "Không tìm thấy mã đơn hàng.";
            exit;
        }

        $id_order = $_GET['id_order'];
        $id_user = $_SESSION['user']['id_users'];

        $orderModel = new Orders();
        $orderItemsModel = new OrderItems();

        try {
            $order = $orderModel->getOrder($id_order);

            if (!$order || $order[0]['id_user'] != $id_user) {
                echo "Bạn không có quyền truy cập đơn hàng này.";
                exit;
            }

            $items = $orderModel->getOrderItems($id_order);

            // Dữ liệu đã sẵn sàng, đưa sang view
            include __DIR__ . '/../views/order/order_detail.php';

        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            exit;
        }
    }
}
?>