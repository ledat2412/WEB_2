<?php
// class user 
// {
//     private $conn;
//     private $table = 'users';
//     public $id;
//     public $usernames;
//     public $email;
//     public $password;
//     public $role;
//     public function user()
//     {
//         if (isset($_POST['register'])) {;
//             $usernames = $_POST['usernames'];
//             $email = $_POST['email'];
//             $password = $_POST['password'];
//             $password = md5($password);

//             $checkEmail = "SELECT * From user where email='$email'";
//             $result = $this->conn->query($checkEmail);
//             if ($result->num_rows > 0) {
//                 echo "Email Address Already Exists !";
//             } else {
//                 $insertQuery = "INSERT INTO user(usernames,email,password)
//                            VALUES ('$usernames','$email','$password')";
//                 if ($this->conn->query($insertQuery) == TRUE) {
//                     header("location: index.php");
//                 } else {
//                     echo "Error:" . $this->conn->error;
//                 }
//             }
//         }

//         if (isset($_POST['signIn'])) {
//             $email = $_POST['email'];
//             $password = $_POST['password'];
//             $password = md5($password);
    
//             $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
//             $result = $this->conn->query($sql);
    
//             if ($result->num_rows > 0) {
//                 session_start();
//                 $row = $result->fetch_assoc();
//                 $_SESSION['email'] = $row['email'];
//                 $_SESSION['role'] = $row['role'];  // Lưu role của người dùng vào session
    
//                 if ($row['role'] == '0') {
//                     header("Location: homepage.php");  // Người dùng thông thường
//                 } elseif ($row['role'] == '10') {
//                     header("Location: admin.php");  // Quản trị viên
//                 } elseif ($row['role'] == '1') {
//                     header("Location: shopkeeper.php");  // chủ cửa hàng
//                 }
//                 exit();
//             } else {
//                 echo "Not Found, Incorrect Email or Password";
//             }
//         }
//     }
// }
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/model/php/connect.php";

// Initialize database connection
$connect = Connect::getInstance();
$conn = $connect->getConnection();

if(isset($_POST['signUp'])){
    // Check if all required fields are present
    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin";
        header("location: /Git/app/view/log/signup.php");
        exit();
    }
    
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    // Check if passwords match
    if(isset($_POST['confirm_password']) && $password !== $_POST['confirm_password']) {
        $_SESSION['error'] = "Mật khẩu không khớp";
        header("location: /Git/app/view/log/signup.php");
        exit();
    }
    
    $password = md5($password);

    // Check if email exists
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    
    if($result->num_rows > 0) {
        $_SESSION['error'] = "Email đã tồn tại";
        header("location: /Git/app/view/log/signup.php");
        exit();
    } else {
        // Start transaction
        $conn->begin_transaction();
        
        try {
            // First create a shopcart for the new user
            $createShopcart = "INSERT INTO shopcarts () VALUES ()";
            if($conn->query($createShopcart) === TRUE) {
                $id_shopcarts = $conn->insert_id;
                
                // Then insert the new user with the shopcart ID
                $insertQuery = "INSERT INTO users(usernames, email, password, role, id_shopcarts) 
                              VALUES ('$username', '$email', '$password', 0, $id_shopcarts)";
                
                if($conn->query($insertQuery) === TRUE) {
                    // Commit the transaction
                    $conn->commit();
                    $_SESSION['success'] = "Đăng ký thành công!";
                    header("location: /Git/app/view/log/signin.php");
                    exit();
                } else {
                    throw new Exception($conn->error);
                }
            } else {
                throw new Exception($conn->error);
            }
        } catch (Exception $e) {
            // Rollback the transaction
            $conn->rollback();
            $_SESSION['error'] = "Lỗi: " . $e->getMessage();
            header("location: /Git/app/view/log/signup.php");
            exit();
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['usernames'];
        $_SESSION['role'] = $row['role'];

        switch ($row['role']) {
            case '0':
                header("Location: /Git/app/view/web/homepage.php");
                break;
            case '10':
                header("Location: /Git/app/view/admin/dashboard.php");
                break;
            case '1':
                header("Location: /Git/app/view/shopkeeper/dashboard.php");
                break;
            default:
                header("Location: /Git/app/view/web/homepage.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Email hoặc mật khẩu không đúng";
        header("Location: /Git/app/view/log/signin.php");
        exit();
    }
}