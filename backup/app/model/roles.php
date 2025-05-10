<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new database();

$table_roles = $db->handle("CREATE TABLE IF NOT EXISTS roles (
    id_role TINYINT(4) UNSIGNED PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
)");

class Roles {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function addRole($role_name) {
        $sql = "INSERT INTO roles (role_name) VALUES (?)";
        return $this->db->handle($sql, [$role_name]);
    }

    public function getRole($id) {
        $sql = "SELECT * FROM roles WHERE id_role = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getAllRoles() {
        $sql = "SELECT * FROM roles";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    public function updateRole($id, $role_name) {
        $sql = "UPDATE roles SET role_name = ? WHERE id_role = ?";
        return $this->db->handle($sql, [$role_name, $id]);
    }

    public function deleteRole($id) {
        $sql = "DELETE FROM roles WHERE id_role = ?";
        return $this->db->handle($sql, [$id]);
    }
}
?> 