<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

 $table_roles = $db->exec("CREATE TABLE IF NOT EXISTS roles (
    id_role TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
)");

// Kiểm tra xem bảng roles đã có dữ liệu chưa
$check_roles = $db->exec("SELECT * FROM roles");
$roles_data = $db->getData();

if(!$roles_data) {
    // Nếu chưa có dữ liệu thì thêm vào
    $db->exec("INSERT INTO roles (id_role, role_name) VALUES 
        (0, 'user'),
        (1, 'admin')
    ");
}

class Roles {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addRole($role_name) {
        $sql = "INSERT INTO roles (role_name) VALUES (?)";
        return $this->db->exec($sql, [$role_name]);
    }

    public function getRole($id) {
        $sql = "SELECT * FROM roles WHERE id_role = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getAllRoles() {
        $sql = "SELECT * FROM roles";
        $this->db->exec($sql);
        return $this->db->getData();
    }

    public function updateRole($id, $role_name) {
        $sql = "UPDATE roles SET role_name = ? WHERE id_role = ?";
        return $this->db->exec($sql, [$role_name, $id]);
    }

    public function deleteRole($id) {
        $sql = "DELETE FROM roles WHERE id_role = ?";
        return $this->db->exec($sql, [$id]);
    }
}
?>
