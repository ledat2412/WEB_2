<?php 
    include_once '../tables/database.php';
    include_once '../tables/users.php';
    include_once '../tables/roles.php';
    $register = new database();
    $nameError = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['confirm_pass']) || empty($_POST['phone']) || empty($_POST['gmail'])) {
            $nameError = "Vui lòng nhập đầy đủ";
        }
        else if ($_POST['pass'] != $_POST['confirm_pass']) {
            $nameError = "Hai mật khẩu không khớp";
        }
        else if (!preg_match("/^[a-zA-Z0-9@_]+$/", $_POST['pass'])) {
            $nameError = "Không được chưa ký tự đặc biệt";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/DoAn/public/css/index.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
    <body class="Resister-body">
        <form action="" method="post" class="form-register">
            <div class="Resister-form-frame">
                <div class="form-heading">
                    <h1>Register</h1>
                </div>
                <div class="Resister-form-group">
                    <input type="text" name="user" class="user" placeholder="User Name" required>
                </div>
                <div class="Resister-form-group">
                    <input type="password" name="pass" class="pass" placeholder="Password" required>
                </div>
                <div class="Resister-form-group">
                    <input type="password" name="confirm_pass" class="pass" placeholder="Checking you password" required>
                </div>
                <div class="Resister-form-group">
                    <input type="email" name="email" class="gmail" placeholder="Email" required>
                </div>
                <div class="Resister-form-group">
                    <span class="error" >
                        <?php 
                            if (!empty($nameError)) {
                                echo $nameError;
                            }
                        ?>
                    </span>
                </div>
                <div class="Resister-submit">
                    <input type="submit" name="btn" class="sub" value="Đăng Ký">
                </div>
                <p class="login-form-support">Already have an account? <a href="/web/log/Login.html"> Login</a></p>
            </div>
        </form>
    </body>
</html>