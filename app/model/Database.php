<?php
if (!class_exists('DB')) {
    class DB {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db_name = "lining_1";

        private $conn = null;
        private $result = null;

        //constructor để tự động kết nối khi khởi tạo
        public function __construct() {
            $this->connect();
        }

        //func kết nối với database
        public function connect(){
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                die("Connection error: " . $this->conn->connect_error);
            }
            mysqli_set_charset($this->conn, "utf8");
            return $this->conn;
        }

        //func execute
        public function exec($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        //func get 
        public function getData(){
            if($this->result){
                $data = mysqli_fetch_all($this->result, MYSQLI_ASSOC);
            }else{
                $data = 0;
            }
            return $data;
        }

        //func get all
        public function getAll(){
            if (!$this->result){
                $data = 0; 
            }else{
                while($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }

        //func insert
        public function insert(){
            $sql = "INSERT INTO () VALUES ()";
            if (!$this->exec($sql)){
                return false;
            }else{
                return true;
            }
            return $this->exec($sql);
        }
        
        //func update
        public function update(){
            $sql = "UPDATE () SET () WHERE ()";
            if (!$this->exec($sql)){
                return false;
            }else{
                return true;
            }
            return $this->exec($sql);
        }
        
        //func delete
        public function delete(){
            $sql = "DELETE FROM () WHERE ()";
            if (!$this->exec($sql)){
                return false;
            }else{
                return true;
            }
            return $this->exec($sql);
        }
        

        //func count row
    }
}
?> 