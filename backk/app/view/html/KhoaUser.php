<?php 
    include_once "../../../app/model/database.php";
    include_once "../../../app/model/users.php";

    $db = new database();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['status']) && isset($_POST['id_user'])){
            $status = $_POST['status'];
            $id_user = $_POST['id_user'];
            
            if(isset($id_user)){
                // Sửa lại tên bảng cho đúng là 'users' thay vì 'user'
                $db->handle("UPDATE users SET status = '$status' WHERE id_users ='$id_user'");
            }
        }
    }
    header('location: Quanlycauhinh.php');
?>