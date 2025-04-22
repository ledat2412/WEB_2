<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_payment_history = $db->exec("CREATE TABLE IF NOT EXISTS payment_history (
    id_payment_history INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_payment INT UNSIGNED,
    id_order INT UNSIGNED,
    FOREIGN KEY (id_payment) REFERENCES payment(id_payment),
    FOREIGN KEY (id_order) REFERENCES `order`(id_order)
)");

class PaymentHistory {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addPaymentHistory($id_payment, $id_order) {
        $sql = "INSERT INTO payment_history (id_payment, id_order) VALUES (?, ?)";
        return $this->db->exec($sql, [$id_payment, $id_order]);
    }

    public function getPaymentHistory($id) {
        $sql = "SELECT ph.*, p.payment_method, o.status as order_status, u.username
                FROM payment_history ph
                LEFT JOIN payment p ON ph.id_payment = p.id_payment
                LEFT JOIN `order` o ON ph.id_order = o.id_order
                LEFT JOIN users u ON p.id_user = u.id_users
                WHERE ph.id_payment_history = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getPaymentHistoryByPayment($id_payment) {
        $sql = "SELECT ph.*, p.payment_method, o.status as order_status, u.username
                FROM payment_history ph
                LEFT JOIN payment p ON ph.id_payment = p.id_payment
                LEFT JOIN `order` o ON ph.id_order = o.id_order
                LEFT JOIN users u ON p.id_user = u.id_users
                WHERE ph.id_payment = ?";
        $this->db->exec($sql, [$id_payment]);
        return $this->db->getData();
    }

    public function getPaymentHistoryByOrder($id_order) {
        $sql = "SELECT ph.*, p.payment_method, o.status as order_status, u.username
                FROM payment_history ph
                LEFT JOIN payment p ON ph.id_payment = p.id_payment
                LEFT JOIN `order` o ON ph.id_order = o.id_order
                LEFT JOIN users u ON p.id_user = u.id_users
                WHERE ph.id_order = ?";
        $this->db->exec($sql, [$id_order]);
        return $this->db->getData();
    }

    public function getAllPaymentHistory() {
        $sql = "SELECT ph.*, p.payment_method, o.status as order_status, u.username
                FROM payment_history ph
                LEFT JOIN payment p ON ph.id_payment = p.id_payment
                LEFT JOIN `order` o ON ph.id_order = o.id_order
                LEFT JOIN users u ON p.id_user = u.id_users";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function deletePaymentHistory($id) {
        $sql = "DELETE FROM payment_history WHERE id_payment_history = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 