<?php
require_once 'database.php';
require_once 'users.php';

// Khởi tạo kết nối database
$db = new database();

$table_addresses = $db->handle("CREATE TABLE IF NOT EXISTS addresses (
    id_address INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,

    phone VARCHAR(20),
    address VARCHAR(255),
    FOREIGN KEY (id_user) REFERENCES users(id_users)
)");

class Addresses {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addAddress($id_user, $phone, $address) {
        $sql = "INSERT INTO addresses (id_user, phone, address) VALUES (?, ?, ?)";
        return $this->db->handle($sql, [$id_user, $phone, $address]);
    }

    public function getAddress($id) {
        $sql = "SELECT * FROM addresses WHERE id_address = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getAddressesByUser($id_user) {
        $sql = "SELECT * FROM addresses WHERE id_user = ?";
        $this->db->handle($sql, [$id_user]);
        return $this->db->getData($sql);
    }

    public function getAllAddresses() {
        $sql = "SELECT * FROM addresses";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateAddress($id, $phone, $address) {
        $sql = "UPDATE addresses SET phone = ?, address = ? WHERE id_address = ?";
        return $this->db->handle($sql, [$phone, $address, $id]);
    }

    public function deleteAddress($id) {
        $sql = "DELETE FROM addresses WHERE id_address = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 