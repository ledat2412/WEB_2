<?php
require_once 'database.php';
require_once 'payments.php';

// Tạo bảng payment_history nếu chưa có
$db = new database();
$table_payment_history = $db->handle("
    CREATE TABLE IF NOT EXISTS payment_history (
        id_history INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_payment INT UNSIGNED NOT NULL,
        id_order INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_payment) REFERENCES payments(id_payment),
        FOREIGN KEY (id_order) REFERENCES orders(id_order)
    )
");

// Định nghĩa lớp PaymentHistory
class PaymentHistory {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addHistory($id_payment, $id_order) {
        $sql = "INSERT INTO payment_history (id_payment, id_order) VALUES (?, ?)";
        return $this->db->handle($sql, [$id_payment, $id_order]);
    }

    public function getHistory($id) {
        $sql = "SELECT h.id_history, 
                       p.id_payment, p.amount, p.method, p.payment_date, 
                       o.id_order, o.customer_name, o.order_date, 
                       i.product_name, i.quantity, i.price
                FROM payment_history h
                JOIN payments p ON h.id_payment = p.id_payment
                JOIN orders o ON h.id_order = o.id_order
                JOIN order_items i ON o.id_order = i.id_order
                WHERE h.id_history = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }
      public function getAllHistory() {
        $sql = "SELECT h.id_history, p.id_payment, p.amount, p.method, 
                       o.id_order, o.customer_name, o.order_date
                FROM payment_history h
                JOIN payments p ON h.id_payment = p.id_payment
                JOIN orders o ON h.id_order = o.id_order
                ORDER BY h.id_history DESC";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }
}
?>
