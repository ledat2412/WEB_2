<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_addresses = $db->exec("CREATE TABLE IF NOT EXISTS addresses (
    id_address INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    receiver_name VARCHAR(100),
    phone VARCHAR(20),
    address VARCHAR(255),
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

    public function getAddress($id) {
        $sql = "SELECT a.*, u.username FROM addresses a 
                LEFT JOIN users u ON a.id_user = u.id_users 
                WHERE a.id_address = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAddressesByUser($id_user) {
        $sql = "SELECT * FROM addresses WHERE id_user = ?";
        $this->db->exec($sql, [$id_user]);
        return $this->db->getData();
    }

    public function getAllAddresses() {
        $sql = "SELECT a.*, u.username FROM addresses a 
                LEFT JOIN users u ON a.id_user = u.id_users";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateAddress($id, $receiver_name, $phone, $address) {
        $sql = "UPDATE addresses SET receiver_name = ?, phone = ?, address = ? WHERE id_address = ?";
        return $this->db->exec($sql, [$receiver_name, $phone, $address, $id]);
    }

    public function deleteAddress($id) {
        $sql = "DELETE FROM addresses WHERE id_address = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?> 