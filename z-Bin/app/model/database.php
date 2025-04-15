<?php 
    class database {
        private $server = "localhost";
        private $user = "root";
        private $pass = "";
        private $database = "";

        private $conn = null;
        private $result = null;

        // Hàm kiểm tra kết nối
        public function connect () {
            $this->conn = new mysqli ($this->server, $this->user, $this->pass, $this->database);
            if ($this->conn -> connect_error) {
                die("Kết nối thất bại");
            }
        }

        // Hàm thực thi 
        public function execute ($sql) {
            $this->connect($sql);
            if ($this->conn -> query($sql) !== TRUE) {
                die("Hàm chưa được thực thi");
            }
        } 

        // Hàm lấy dữ liệu
        public function getData ($sql) {
            $this->execute($sql);
            $data = [];
            $this->result = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($this->result) > 0) {
                while ($rows = mysqli_fetch_array($this->result)) {
                    $data[] = $rows;
                }
            }
            return $data;
        }

        // Hàm xử lý các lệnh 
        public function handle($sql) {
            $this->execute($sql);
        }
    }

?>