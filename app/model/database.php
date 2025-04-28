<?php
class database
{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "lining_1";


    
    private $conn = null;
    private $result = null;

    public function __construct()
    {
        $this->connect();
    }

    // Hàm kiểm tra kết nối
    public function connect()
    {
        $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->database);
        if ($this->conn->connect_error) {
            die("Kết nối thất bại");
        }
    }

    // Hàm thực thi 
    public function execute($sql)
    {
        $this->connect();
        if ($this->conn->query($sql) !== TRUE) {
            die("Hàm chưa được thực thi");
        }
    }
    
    // Hàm xử lý các lệnh 
    public function handle($sql, $params = [])
    {
        $this->connect();
        if (empty($params)) {
            // Không có tham số, chạy query bình thường
            return $this->conn->query($sql);
        } else {
            // Có tham số, dùng prepared statement
            $stmt = $this->conn->prepare($sql);
            if ($stmt === false) {
                die('Prepare failed: ' . $this->conn->error);
            }
            // Tạo chuỗi kiểu dữ liệu cho bind_param
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) $types .= 'i';
                elseif (is_double($param)) $types .= 'd';
                else $types .= 's';
            }
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            return $stmt;
        }
    }

    // Hàm lấy dữ liệu
    public function getData($sqlOrStmt)
    {
        $data = [];
        if ($sqlOrStmt instanceof \mysqli_stmt) {
            // Nếu là prepared statement
            $result = $sqlOrStmt->get_result();
            if ($result && $result->num_rows > 0) {
                while ($rows = $result->fetch_array()) {
                    $data[] = $rows;
                }
            }
            $sqlOrStmt->close(); // Đóng statement sau khi dùng xong
        } else {
            $this->connect();
            $this->result = mysqli_query($this->conn, $sqlOrStmt);
            if (mysqli_num_rows($this->result) > 0) {
                while ($rows = mysqli_fetch_array($this->result)) {
                    $data[] = $rows;
                }
            }
        }
        return $data;
    }

    public function getAllData($sql)
    {
        $this->connect();
        $this->result = mysqli_query($this->conn, $sql);
        return $this->result;
    }

    public function getInsertId()
    {
        return $this->conn->insert_id;
    }
}
