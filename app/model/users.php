<?php
require_once 'database.php';
require_once 'roles.php';

$db = new database();

    $tabel_user = $db->handle("CREATE TABLE IF NOT EXISTS users (
        id_users INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(100) NOT NULL,
        role TINYINT(4) UNSIGNED NOT NULL,
        status TINYINT(4) UNSIGNED NOT NULL DEFAULT 0,
        FOREIGN KEY (role) REFERENCES roles(id_role)
    )");

class Users {
    // Properties
    private $id_users;
    private $username;
    private $email;
    private $password;
    private $role = 0;            // Mặc định là user thường
    private $db;

    // Constructor chỉ nhận username, email, password đi khởi tạo
    public function __construct($username = null, $email = null, $password = null) {
        $this->db = new database();
        if ($username !== null) $this->username = $username;
        if ($email !== null) $this->email = $email;
        if ($password !== null) $this->password = $password;
    }

    // Phương thức đăng ký
    public function register() {
        // Kiểm tra username và email đã tồn tại chưa
        $checkUser = "SELECT * FROM USERS WHERE username = '$this->username' OR email = '$this->email'";
        $result = $this->db->handle($checkUser);
        $data = $this->db->getData($checkUser);
        
        if($data) {
            return "Username hoặc email đã tồn tại";
        }

        // Thêm user mới với các thông tin cơ bản
        $sql = "INSERT INTO USERS (username, email, password, role) 
                VALUES ('$this->username', '$this->email', '$this->password', $this->role)";
        
        if($this->db->handle($sql)) {
            return "Đăng ký thành công";
        }
        return "Đăng ký thất bại";
    }

    // Phương thức đăng nhập
    public function login($account, $password) {
        // Tìm kiếm user theo username hoặc email và chỉ cho phép đăng nhập nếu status = 0
        $sql = "SELECT * FROM USERS WHERE (username = '$account' OR email = '$account') AND password = '$password' AND role = 0 AND status = 0";
        $this->db->handle($sql);
        $data = $this->db->getData($sql);

        if($data) {
            // Lưu thông tin vào session
            $_SESSION['user_id'] = $data[0]['id_users'];
            $_SESSION['username'] = $data[0]['username'];
            $_SESSION['email'] = $data[0]['email'];
            $_SESSION['role'] = $data[0]['role'];
            return "Đăng nhập thành công";
        }
        // Kiểm tra nếu tài khoản tồn tại nhưng bị khóa
        $checkStatus = "SELECT * FROM USERS WHERE (username = '$account' OR email = '$account') AND password = '$password' AND role = 0 AND status = 1";
        $locked = $this->db->getData($checkStatus);
        if ($locked) {
            return "Tài khoản của bạn đã bị khóa";
        }
        return "Thông tin đăng nhập không đúng";
    }

    public function loginforadmin($account, $password) {
        // Tìm kiếm user theo username hoặc email, cho phép admin đăng nhập nếu status = 0
        $sql = "SELECT * FROM USERS WHERE (username = '$account' OR email = '$account') AND password = '$password' AND status = 0";
        $this->db->handle($sql);
        $data = $this->db->getData($sql);

        if($data) {
            // Lưu thông tin vào session
            $_SESSION['user_id'] = $data[0]['id_users'];
            $_SESSION['username'] = $data[0]['username'];
            $_SESSION['email'] = $data[0]['email'];
            $_SESSION['role'] = $data[0]['role'];
            return "Đăng nhập thành công";
        }
        // Kiểm tra nếu tài khoản tồn tại nhưng bị khóa
        $checkStatus = "SELECT * FROM USERS WHERE (username = '$account' OR email = '$account') AND password = '$password' AND status = 1";
        $locked = $this->db->getData($checkStatus);
        if ($locked) {
            return "Tài khoản của bạn đã bị khóa";
        }
        return "Thông tin đăng nhập không đúng";
    }

    // // Phương thức cập nhật thông tin bổ sung sau
    // public function updateProfile($id, $firstName, $lastName) {
    //     $sql = "UPDATE USERS SET 
    //             firstName = '$firstName',
    //             lastName = '$lastName',
    //             WHERE id_users = $id";
        
    //     if($this->db->handle($sql)) {
    //         return "Cập nhật thông tin thành công";
    //     }
    //     return "Cập nhật thông tin thất bại";
    // }

    // Phương thức đổi mật khẩu
    public function changePassword($id, $oldPassword, $newPassword) {
        // Kiểm tra mật khẩu cũ
        $sql = "SELECT * FROM USERS WHERE id_users = $id AND password = '$oldPassword'";
        $this->db->handle($sql);
        $data = $this->db->getData($sql);

        if($data) {
            // Cập nhật mật khẩu mới
            $sql = "UPDATE USERS SET password = '$newPassword' WHERE id_users = $id";
            if($this->db->handle($sql)) {
                return "Đổi mật khẩu thành công";
            }
        }
        return "Mật khẩu cũ không đúng";
    }

    // Phương thức lấy thông tin user
    public function getUserById($id) {
        $sql = "SELECT * FROM USERS WHERE id_users = $id";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    // Phương thức lấy danh sách users (cho admin)
    public function getAllUsers() {
        $sql = "SELECT u.*, r.role_name FROM users u 
                LEFT JOIN roles r ON u.role = r.id_role";
        $this->db->handle($sql);
        return $this->db->getData($sql);
    }

    // Phương thức xóa user (cho admin)
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id_users = ?";
        return $this->db->handle($sql, [$id]);
    }

    // Các getter và setter nếu cần
    public function getUsername() {
        return $this->username;
    }

    public function getRole() {
        return $this->role;
    }

    // ... các getter và setter khác

    public function addUser($username, $email, $password, $role) {
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        return $this->db->handle($sql, [$username, $email, $password, $role]);
    }

    public function getUser($id) {
        $sql = "SELECT u.*, r.role_name FROM users u 
                LEFT JOIN roles r ON u.role = r.id_role 
                WHERE u.id_users = ?";
        $this->db->handle($sql, [$id]);
        return $this->db->getData($sql);
    }

    public function getUserByEmail($email) {
        $sql = "SELECT u.*, r.role_name FROM users u 
                LEFT JOIN roles r ON u.role = r.id_role 
                WHERE u.email = ?";
        $this->db->handle($sql, [$email]);
        return $this->db->getData($sql);
    }

    public function updateUser($id, $username, $email, $password, $role) {
        $sql = "UPDATE users SET username = ?, email = ?, password = ?, role = ? WHERE id_users = ?";
        return $this->db->handle($sql, [$username, $email, $password, $role, $id]);
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->handle($sql, [$username]);
        $data = $this->db->getData($stmt);
        return $data ? $data[0] : null;
    }
}
?>