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
    public function handle($sql)
    {
        $this->connect();
        return $this->conn->query($sql);
    }

    // Hàm lấy dữ liệu
    public function getData($sql)
    {
        $this->connect();
        $data = [];
        $this->result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($this->result) > 0) {
            while ($rows = mysqli_fetch_array($this->result)) {
                $data[] = $rows;
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
}