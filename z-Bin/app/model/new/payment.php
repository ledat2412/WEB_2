<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_payment = $db->exec("CREATE TABLE IF NOT EXISTS payment (
    id_payment INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED,
    payment_method ENUM('by_cash', 'credit') NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_users)
)");

class Payment {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addPayment($id_user, $payment_method) {
        $sql = "INSERT INTO payment (id_user, payment_method) VALUES (?, ?)";
        return $this->db->exec($sql, [$id_user, $payment_method]);
    }

    public function getPayment($id) {
        $sql = "SELECT p.*, u.username FROM payment p 
                LEFT JOIN users u ON p.id_user = u.id_users 
                WHERE p.id_payment = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getUserPayments($id_user) {
        $sql = "SELECT p.*, u.username FROM payment p 
                LEFT JOIN users u ON p.id_user = u.id_users 
                WHERE p.id_user = ?";
        $this->db->exec($sql, [$id_user]);
        return $this->db->getData();
    }

    public function getAllPayments() {
        $sql = "SELECT p.*, u.username FROM payment p 
                LEFT JOIN users u ON p.id_user = u.id_users";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updatePaymentMethod($id, $payment_method) {
        $sql = "UPDATE payment SET payment_method = ? WHERE id_payment = ?";
        return $this->db->exec($sql, [$payment_method, $id]);
    }

    public function deletePayment($id) {
        $sql = "DELETE FROM payment WHERE id_payment = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 