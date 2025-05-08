<?php
    include_once "../models/log/register_model.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($data_register) {
            setcookie("UserName", $_POST['user'], time()+(60*60*24*365), "/");
            setcookie("Password", $_POST['pass'], time()+(60*60*24*365), "/");
        }
    }
?>