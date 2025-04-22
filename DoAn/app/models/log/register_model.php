<?php 
    include_once '../models/tables/database.php';
    include_once '../models/tables/users.php';
    include_once '../models/tables/roles.php';
    $register = new database();
    $nameError = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name_customer = $_POST['user'];
        $data_customer = $register->getData("SELECT * FROM THONGTINKHACHHANG WHERE username LIKE '$name_customer'");
    
        if (empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['confirm_pass']) || empty($_POST['phone']) || empty($_POST['gmail'])) {
            $nameError = "Vui lòng nhập đầy đủ";
        }
        else if ($_POST['pass'] != $_POST['confirm_pass']) {
            $nameError = "Hai mật khẩu không khớp";
        }
        else if (!preg_match("/^[a-zA-Z0-9@_]+$/", $_POST['pass'])) {
            $nameError = "Không được chưa ký tự đặc biệt";
        }
        else if (!empty($data_customer)) {
            $nameError = "Tên đăng ký đã tồn tại";
        }
        else {
            if (isset($_POST['btn'])) {
                $username = $_POST['user'];
                $password = $_POST['pass']; 
                $gmail = $_POST['gmail'];
                $phone = $_POST['phone'];
        
                $data_register = $register->handle("INSERT INTO THONGTINKHACHHANG(username, password, gmail, phone, id_role) VALUES ('$username','$password', '$gmail', '$phone', 0)");
            }
        }
    }
?>

