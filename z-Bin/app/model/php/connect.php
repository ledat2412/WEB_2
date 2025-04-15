<?php
class Connect {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "lining");
        
        if ($this->conn->connect_error) {
            die("Kết nối database thất bại: " . $this->conn->connect_error);
        }
        
        // Set charset to utf8mb4
        $this->conn->set_charset("utf8mb4");
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Connect();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
} 