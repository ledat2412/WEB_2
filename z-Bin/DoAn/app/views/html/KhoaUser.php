<?php 
    include_once "../../models/tables/database.php";
    include_once "../../models/tables/users.php";
    include_once "../../models/tables/status.php";

    $db = new database();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['status']) && isset($_POST['id_user'])){
            $status = $_POST['status'];
            $id_user = $_POST['id_user'];
            
            if(isset($id_user)){
                $db->handle("UPDATE user SET status = '$status' WHERE id_users ='$id_user'");
            }
        }
    }
    header('location: Quanlycauhinh.php');
?>