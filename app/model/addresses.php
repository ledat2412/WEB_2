<?php
require_once 'database.php';
require_once 'users.php';

// Khởi tạo kết nối database
$db = new database();

$table_addresses = $db->handle("CREATE TABLE IF NOT EXISTS addresses (
    id_address INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT UNSIGNED NOT NULL,
    recive_name VARCHAR(255),
    phone VARCHAR(20),
    address VARCHAR(255),
    FOREIGN KEY (id_user) REFERENCES users(id_users)
)");

class Addresses {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addAddress($id_user, $recive_name, $phone, $address) {
        $sql = "INSERT INTO addresses (id_user, recive_name, phone, address) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$id_user, $recive_name, $phone, $address]);
    }

    public function getAddress($id) {
        $sql = "SELECT * FROM addresses WHERE id_address = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getAddressesByUser($id_user) {
        $sql = "SELECT * FROM addresses WHERE id_user = ?";
        $stmt = $this->db->handle($sql, [$id_user]);
        return $this->db->getData($stmt);
    }

    public function getAllAddresses() {
        $sql = "SELECT * FROM addresses";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateAddress($id_address, $id_user, $recive_name, $phone, $address) {
        $sql = "UPDATE addresses SET recive_name = ?, phone = ?, address = ? WHERE id_address = ? AND id_user = ?";
        return $this->db->handle($sql, [$recive_name, $phone, $address, $id_address, $id_user]);
    }

    public function deleteAddress($id_address, $id_user) {
        $sql = "DELETE FROM addresses WHERE id_address = ? AND id_user = ?";
        return $this->db->handle($sql, [$id_address, $id_user]);
    }

    public function getDefaultAddress($id_user) {
        $sql = "SELECT * FROM addresses WHERE id_user = ? ORDER BY id_address ASC LIMIT 1";
        $stmt = $this->db->handle($sql, [$id_user]);
        $result = $this->db->getData($stmt);
        return $result ? $result[0] : null;

    }
}
?>