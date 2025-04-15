<?php
require_once __DIR__ . '/php/connect.php';

class User {
    private $db;
    private $id_users;
    private $usernames;
    private $email;
    private $password;
    private $role;

    public function __construct() {
        $this->db = Connect::getInstance()->getConnection();
        if (!$this->db) {
            die("Database connection failed");
        }
    }

    public function login($email, $password) {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $row['password'])) {
                    $this->id_users = $row['id_users'];
                    $this->usernames = $row['usernames'];
                    $this->email = $row['email'];
                    $this->role = $row['role'];
                    return true;
                }
            }
            return false;
        } catch(PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            return false;
        }
    }

    public function register($username, $email, $password) {
        try {
            // Kiểm tra dữ liệu đầu vào
            if (empty($username) || empty($email) || empty($password)) {
                return "Vui lòng điền đầy đủ thông tin!";
            }

            // Kiểm tra username đã tồn tại
            $checkUsername = $this->db->prepare("SELECT id_users FROM users WHERE usernames = ?");
            $checkUsername->execute([$username]);
            if ($checkUsername->rowCount() > 0) {
                return "Tên đăng nhập đã tồn tại!";
            }

            // Kiểm tra email đã tồn tại
            $checkEmail = $this->db->prepare("SELECT id_users FROM users WHERE email = ?");
            $checkEmail->execute([$email]);
            if ($checkEmail->rowCount() > 0) {
                return "Email đã được sử dụng!";
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thêm user mới
            $stmt = $this->db->prepare("INSERT INTO users (usernames, email, password, role) VALUES (?, ?, ?, 'user')");
            $stmt->execute([$username, $email, $hashedPassword]);

            // Cập nhật thông tin user
            $this->id_users = $this->db->lastInsertId();
            $this->usernames = $username;
            $this->email = $email;
            $this->role = 'user';

            return true;
        } catch(PDOException $e) {
            error_log("Register error: " . $e->getMessage());
            return "Đăng ký thất bại. Vui lòng thử lại!";
        }
    }

    // Getter methods
    public function getId() {
        return $this->id_users;
    }

    public function getUsername() {
        return $this->usernames;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }
} 