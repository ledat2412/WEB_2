<?php 
    include '../DoAn/app/models/database.php';
    include '../DoAn/app/models/roles.php';
    $users = new database();

    $table_users = $users->handle("CREATE TABLE  IF NOT EXISTS USERS (
        id_users INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(50) NOT NULL,
        lastName VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        role TINYINT UNSIGNED NOT NULL DEFAULT 0,
        FOREIGN KEY (role) REFERENCES roles(id_role)
    )");

    class Users {
        private $database;
        public $id_users;
        public $firstName;
        public $lastName;
        public $email;
        public $password;
        public $role;

        public function __construct($firstName = '', $lastName = '', $password = '', $email = '', $role = 0) {
            $this->database = new database();
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->password = $password;
            $this->email = $email;
            $this->role = $role;
        }

        public function addData() {
            // Mã hóa mật khẩu trước khi lưu
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            
            $addDataUser = "INSERT INTO USERS (firstName, lastName, email, password, role) VALUES (
                '{$this->firstName}', 
                '{$this->lastName}', 
                '{$this->email}', 
                '{$hashedPassword}', 
                {$this->role})";
            return $this->database->handle($addDataUser);
        }

        // Phương thức đăng ký
        public function register($firstName, $lastName, $email, $password, $role = 0) {
            // Kiểm tra email đã tồn tại chưa
            if ($this->isEmailExists($email)) {
                return [
                    'success' => false,
                    'message' => 'Email đã được sử dụng'
                ];
            }

            // Kiểm tra độ dài mật khẩu
            if (strlen($password) < 6) {
                return [
                    'success' => false,
                    'message' => 'Mật khẩu phải có ít nhất 6 ký tự'
                ];
            }

            // Kiểm tra định dạng email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return [
                    'success' => false,
                    'message' => 'Email không hợp lệ'
                ];
            }

            // Tạo user mới
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;

            // Thêm vào database
            $result = $this->addData();

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'Đăng ký thành công'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Có lỗi xảy ra khi đăng ký'
                ];
            }
        }

        // Thêm phương thức đăng nhập
        public function login($email, $password) {
            $sql = "SELECT * FROM USERS WHERE email = '$email' LIMIT 1";
            $result = $this->database->handle($sql);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id_users'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_role'] = $user['role'];
                    return true;
                }
            }
            return false;
        }

        // Thêm phương thức kiểm tra email tồn tại
        public function isEmailExists($email) {
            $sql = "SELECT COUNT(*) as count FROM USERS WHERE email = '$email'";
            $result = $this->database->handle($sql);
            $row = mysqli_fetch_assoc($result);
            return $row['count'] > 0;
        }

        // Phương thức lấy thông tin user theo ID
        public function getUserById($id) {
            $sql = "SELECT * FROM USERS WHERE id_users = $id";
            $result = $this->database->handle($sql);
            return mysqli_fetch_assoc($result);
        }

        // Phương thức cập nhật thông tin user
        public function updateUser($id, $firstName, $lastName, $email) {
            $sql = "UPDATE USERS SET 
                    firstName = '$firstName', 
                    lastName = '$lastName', 
                    email = '$email' 
                    WHERE id_users = $id";
            return $this->database->handle($sql);
        }

        // Phương thức đổi mật khẩu
        public function changePassword($id, $oldPassword, $newPassword) {
            $user = $this->getUserById($id);
            
            if ($user && password_verify($oldPassword, $user['password'])) {
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $sql = "UPDATE USERS SET password = '$hashedNewPassword' WHERE id_users = $id";
                return $this->database->handle($sql);
            }
            return false;
        }
    }
?>
