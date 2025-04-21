<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_payment_history = $db->exec("CREATE TABLE IF NOT EXISTS payment_history (
    id_payment_history INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_payment INT UNSIGNED NOT NULL,
    id_order INT UNSIGNED NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_payment) REFERENCES payment(id_payment),
    FOREIGN KEY (id_order) REFERENCES `order`(id_order)
)");

class PaymentHistory {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addPaymentHistory($id_payment, $id_order, $amount) {
        $sql = "INSERT INTO payment_history (id_payment, id_order, amount) VALUES (?, ?, ?)";
        return $this->db->exec($sql, [$id_payment, $id_order, $amount]);
    }

    public function getPaymentHistory($id) {
        $sql = "SELECT ph.*, p.payment_method, o.status as order_status
                FROM payment_history ph
                JOIN payment p ON ph.id_payment = p.id_payment
                JOIN `order` o ON ph.id_order = o.id_order
                WHERE ph.id_payment_history = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getPaymentHistoryByPayment($id_payment) {
        $sql = "SELECT ph.*, o.status as order_status
                FROM payment_history ph
                JOIN `order` o ON ph.id_order = o.id_order
                WHERE ph.id_payment = ?
                ORDER BY ph.payment_date DESC";
        $this->db->exec($sql, [$id_payment]);
        return $this->db->getData();
    }

    public function getPaymentHistoryByOrder($id_order) {
        $sql = "SELECT ph.*, p.payment_method
                FROM payment_history ph
                JOIN payment p ON ph.id_payment = p.id_payment
                WHERE ph.id_order = ?
                ORDER BY ph.payment_date DESC";
        $this->db->exec($sql, [$id_order]);
        return $this->db->getData();
    }

    public function getTotalPaid($id_order) {
        $sql = "SELECT SUM(amount) as total_paid
                FROM payment_history
                WHERE id_order = ?";
        $this->db->exec($sql, [$id_order]);
        $result = $this->db->getData();
        return $result[0]['total_paid'] ?? 0;
    }
}
?> 