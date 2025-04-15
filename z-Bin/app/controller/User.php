<?php

include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/model/database.php";

$db = new database();

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $db; // đối tượng Database

    public function __construct() {
        $this->db = new Database();
        $this->db->connnect();
    }

    // Các getter và setter
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}

?>