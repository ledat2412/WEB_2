<?php
require_once '../database.php';

$db = new DB();

// Kiểm tra xem bảng roles đã có dữ liệu chưa
$check_roles = $db->exec("SELECT * FROM roles");
$roles_data = $db->getData();

if(!$roles_data) {
    // Nếu chưa có dữ liệu thì thêm vào
    $db->exec("INSERT INTO roles (id_role, role_name) VALUES 
        (0, 'user'),
        (1, 'admin')
    ");
    echo "Đã thêm dữ liệu vào bảng roles thành công";
} else {
    echo "Bảng roles đã có dữ liệu";
}
?>