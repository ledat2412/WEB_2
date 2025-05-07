<?php 
    include_once '../models/tables/database.php';
    $login = new database();

    $nameError = "";    
    if (isset($_POST['btn'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $data_login = $login->getData("SELECT * FROM user WHERE (username LIKE '$username') AND (password LIKE '$password')");
        if ($data_login) {
            $nameError = "Đăng Nhập rồi";
            // để đó sau này học session rồi chuyển trang sau
        }
        else {
            $nameError =  "Tên đăng nhập hoặc mật khẩu không chính xác";
        }
    }
?>

