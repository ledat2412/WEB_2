<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_addresses = $db->exec("CREATE TABLE IF NOT EXISTS addresses (
    id_address INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    receiver_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_users)
)");

class Addresses {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addAddress($id_user, $receiver_name, $phone, $address) {
        $sql = "INSERT INTO addresses (id_user, receiver_name, phone, address) VALUES (?, ?, ?, ?)";
        return $this->db->exec($sql, [$id_user, $receiver_name, $phone, $address]);
    }

    public function getAddressesByUser($id_user) {
        $sql = "SELECT * FROM addresses WHERE id_user = ?";
        $this->db->exec($sql, [$id_user]);
        return $this->db->getData();
    }

    public function updateAddress($id_address, $receiver_name, $phone, $address) {
        $sql = "UPDATE addresses SET receiver_name = ?, phone = ?, address = ? WHERE id_address = ?";
        return $this->db->exec($sql, [$receiver_name, $phone, $address, $id_address]);
    }

    public function deleteAddress($id_address) {
        $sql = "DELETE FROM addresses WHERE id_address = ?";
        return $this->db->exec($sql, [$id_address]);
    }
}
?> 