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
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    // Hàm thực thi câu lệnh SQL mà không có tham số
    public function execute($sql)
    {
        $this->connect();
        if ($this->conn->query($sql) !== TRUE) {
            die("Hàm chưa được thực thi");
        }
    }

    // Hàm xử lý các câu lệnh SQL có tham số
    public function handle($sql, $params = [])
    {
        $this->connect();
        if (empty($params)) {
            // Nếu không có tham số, dùng query bình thường
            return $this->conn->query($sql);
        } else {
            // Nếu có tham số, sử dụng prepared statement
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
            $result = $sqlOrStmt->get_result();
            if ($result && $result->num_rows > 0) {
                while ($rows = $result->fetch_array()) {
                    $data[] = $rows;
                }
            }
            $sqlOrStmt->close();
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

    // Lấy ID của bản ghi vừa chèn vào
    public function getInsertId()
    {
        return $this->conn->insert_id;
    }

    public function lastInsertId() {
        return $this->conn->insert_id;
    }
}
?>
