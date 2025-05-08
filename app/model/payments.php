<?php
require_once 'database.php';
require_once 'users.php';

// Khởi tạo kết nối database
$db = new database();

$table_payments = $db->handle("CREATE TABLE IF NOT EXISTS payments (
    id_payment INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    payment_method ENUM('cash', 'credit') NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_users)
)");

class Payments {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    // Lấy thông tin thanh toán theo ID
    public function getPayment($id) {
        $sql = "SELECT * FROM payments WHERE id_payment = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);  // Trả về dữ liệu chi tiết thanh toán
    }

    // Lấy tất cả thanh toán của người dùng
    public function getPaymentsByUser($id_user) {
        $sql = "SELECT * FROM payments WHERE id_user = ?";
        $this->db->handle($sql, [$id_user]);
        return $this->db->getData($sql);  // Trả về danh sách thanh toán của người dùng
    }

    // Lấy tất cả thanh toán
    public function getAllPayments() {
        $sql = "SELECT * FROM payments";
        $this->db->handle($sql);
        return $this->db->getData($sql);  // Trả về danh sách tất cả thanh toán
    }

    // Cập nhật thông tin thanh toán
    public function updatePayment($id, $id_user, $payment_method) {
        $sql = "UPDATE payments SET id_user = ?, payment_method = ? WHERE id_payment = ?";
        return $this->db->handle($sql, [$id_user, $payment_method, $id]);
    }

    // Xóa thanh toán theo ID
    public function deletePayment($id) {
        $sql = "DELETE FROM payments WHERE id_payment = ?";
        return $this->db->handle($sql, [$id]);
    }

    // Thêm thanh toán mới
    public function addPayment($id_user, $payment_method) {
        $sql = "INSERT INTO payments (id_user, payment_method) VALUES (?, ?)";
        $this->db->handle($sql, [$id_user, $payment_method]);
        return $this->db->lastInsertId();  // Lấy ID của thanh toán vừa thêm
    }
}
?>
