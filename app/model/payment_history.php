<?php
require_once 'database.php';
require_once 'payments.php';

// Khởi tạo kết nối database
$db = new database();

$table_payment_history = $db->handle("CREATE TABLE IF NOT EXISTS payment_history (
    id_history INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_payment INT UNSIGNED NOT NULL,
    id_order INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_payment) REFERENCES payments(id_payment),
    FOREIGN KEY (id_order) REFERENCES orders(id_order)
)");

class PaymentHistory {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addHistory($id_payment, $id_order) {
        $sql = "INSERT INTO payment_history (id_payment, id_order) 
                VALUES (?, ?)";
        return $this->db->handle($sql, [$id_payment, $id_order]);
    }

    public function getHistory($id) {
        $sql = "SELECT h.*, p.id_order, p.amount 
                FROM payment_history h 
                LEFT JOIN payments p ON h.id_payment = p.id_payment 
                WHERE h.id_history = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getHistoryByPayment($id_payment) {
        $sql = "SELECT * FROM payment_history WHERE id_payment = ? ORDER BY id_order DESC";
        $this->db->handle($sql, [$id_payment]);
        return $this->db->getData($sql);
    }

    public function getAllHistory() {
        $sql = "SELECT h.*, p.id_order, p.amount 
                FROM payment_history h 
                LEFT JOIN payments p ON h.id_payment = p.id_payment 
                ORDER BY h.id_order DESC";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateHistory($id, $id_payment, $id_order) {
        $sql = "UPDATE payment_history SET id_payment = ?, id_order = ? WHERE id_history = ?";
        return $this->db->handle($sql, [$id_payment, $id_order, $id]);
    }

    public function deleteHistory($id) {
        $sql = "DELETE FROM payment_history WHERE id_history = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 