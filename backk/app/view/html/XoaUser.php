<?php 
// Sửa lại đường dẫn include cho đúng với cấu trúc thư mục thực tế
include_once "../../../app/model/database.php";
// Nếu cần thao tác với user, có thể include thêm users.php
// include_once "../../../app/model/users.php";

$db = new database();

if($_SERVER['REQUEST_METHOD'] === "POST" )
    if(isset($_POST['del']) && isset($_POST['del_id'])){
        $get_id = $_POST['del_id'];
        // Sửa lại tên bảng cho đúng là 'users' thay vì 'user'
        $delete = $db->handle("DELETE FROM users WHERE id_users = '$get_id'");
    }
    header('location: Quanlycauhinh.php');
?>