<?php
    include_once "../../contronllers/login_cookie.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/DoAn/public/css/index.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
    <body class="body-login">
        <form action="" onsubmit="return login()" class="form-login" method="POST">
            <div class="login-form-frame">
                <div class="form-heading">
                    <h1>Login</h1>
                </div>
                <div class="login-form-group"> 
                    <input type="text" class="user" placeholder="User" id="user" name="user" required value="<?php echo $_COOKIE['UserName'] ?>">
                </div>
                <div class="login-form-group">
                    <input type="password" class="pass" placeholder="Password" id="passer" name="pass" required value="<?php echo $_COOKIE['Password']?>">
                </div>
                <div>
                    <p class="reset-password">
                        <a href="">Forgot password?</a>
                    </p>
                </div>
                <div class="login-form-group">
                    <span class= "Error">
                        <?php
                            if (!empty($nameError)) {
                                echo $nameError;
                            } 
                        ?>
                    </span>
                </div>
                <div class="login-submit">
                    <input type="submit" class="sub" value="Login Now" name="btn">
                </div>
                <p class="login-form-support">Don't have an account yet? <a href="/web/log/Register.html"> Signup Now</a></p>
            </div>
        </form>
    </body>
    <script src="/web/script.js"></script>
</html>