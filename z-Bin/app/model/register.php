
<?php
require_once 'Auth.php';

$auth = new Auth();

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result = $auth->register($username, $email, $password);
    echo $result;
}

require_once 'Auth.php';

$auth = new Auth();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $result = $auth->login($username, $password);
    echo $result;
}
?>
