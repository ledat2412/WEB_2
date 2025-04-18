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
?>
