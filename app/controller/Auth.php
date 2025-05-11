<?php 
session_start();
require_once '../model/users.php';

class Auth {
    private $user;

    public function __construct() {
    }

    public function handleRegister() {
        if(isset($_POST['signUp'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if($password !== $confirm_password) {
                header("Location: ../view/log/signup.php?error=Mật khẩu không khớp");
                return;
            }


            $this->user = new Users($username, $email, $password);
            

            $result = $this->user->register();
            
            if($result == "Đăng ký thành công") {
                header("Location: ../view/log/signin.php?success=register");
            } else {
                header("Location: ../view/log/signup.php?error=" . urlencode($result));
            }
        }
    }

    public function handleLogin() {
        if(isset($_POST['signIn'])) {
            $account = $_POST['account'];
            $password = $_POST['password'];

            $this->user = new Users("", "", "");
            
            $result = $this->user->login($account, $password);
            
            if($result == "Đăng nhập thành công") {

                header("Location: /WEB_2/Lining");

            } else {
                header("Location: ../view/log/signin.php?error=" . urlencode($result));
            }
        }
    }
    public function handleLoginforadmin() {
        if(isset($_POST['signInforadmin'])) {
            $account = $_POST['account'];
            $password = $_POST['password'];

            // Tạo đối tượng Users
            $this->user = new Users("", "", "");
            
            // Gọi phương thức login
            $result = $this->user->loginforadmin($account, $password);
            
            if($result == "Đăng nhập thành công") {

                
                if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    header("Location: /WEB_2/app/view/html/admin.php");
                } else {
                    header("Location: /WEB_2/Lining");
                }
            } else {
                header("Location: ../view/log/signin.php?error=" . urlencode($result));
            }
        }
    }

    public function handleLogout() {
        session_start();
        session_destroy();
        header("Location: /WEB_2/");
        exit();
    }
}

// Xử lý request
$auth = new Auth();

if(isset($_POST['signUp'])) {
    $auth->handleRegister();
} elseif(isset($_POST['signIn'])) {
    $auth->handleLogin();
} elseif (isset($_POST['signInforadmin'])) {
    $auth->handleLoginforadmin();
} elseif(isset($_GET['logout'])) {
    $auth->handleLogout();


    exit();
}
?>
