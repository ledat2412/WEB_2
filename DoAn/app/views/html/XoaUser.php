<?php 
    include_once "../../models/tables/database.php";

    $db = new database();

    if($_SERVER['REQUEST_METHOD'] === "POST" )
        if(isset($_POST['del']) && isset($_POST['del_id'])){
            $get_id = $_POST['del_id'];
            $delete = $db ->handle("DELETE FROM user WHERE id_users = '$get_id'");
        }
        header('location: Quanlycauhinh.php');
?>