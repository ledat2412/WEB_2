<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/WEB_2/public/assets/css/signin.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/base.css">
    <link rel="icon" href="/WEB_2/public/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body class="body-login">
<form method="post" action="/WEB_2/app/controller/Auth.php" class="form-login">
        <div class="login-form-frame">
            <div class="back-button">
                <a href="/WEB_2/app/controller/main.php?act=home"><i class="fa-solid fa-arrow-left"> Go back</i></a>
            </div>
            <div class="form-heading">
                <h1>Login</h1>
            </div>
            <div class="login-form-group">
                <input type="text" class="user" placeholder="account" id="account" name="account" required>
            </div>
            <div class="login-form-group">
                <input type="password" class="pass" placeholder="password" id="password" name="password" required>
            </div>
            <div>
                <p class="reset-password">
                    <a href="">Forgot password?</a>
                </p>
            </div>
            <?php
            if(isset($_GET['error'])) {
                echo "<div class='error-message'>" . $_GET['error'] . "</div>";
            }
            if(isset($_GET['success'])) {
                echo "<div class='success-message'>" . $_GET['success'] . "</div>";
            }
            ?>
            <div class="login-submit">
                <input type="submit" class="sub" value="sign In" name="signIn"> 
            </div>
            <p class="login-form-support">Don't have an account yet? <a href="/WEB_2/app/view/log/signup.php"> Signup Now</a></p>
        </div>
    </form>
</body>
<script src="/WEB_2/public/assets/js/script.js"></script>

</html>


    <!-- <form method="post" action="/WEB_2/app/controller/Auth.php" class="form-login">
        <div class="Login-form-frame">
            <div class="back-button">
                <a href="/WEB_2/app/controller/main.php?act=home"><i class="fa-solid fa-arrow-left"> Go back</i></a>
            </div>
            <div class="form-heading">
                <h1>Login</h1>
            </div>
            <div class="Login-form-group">
                <input type="text" name="account" placeholder="Username hoặc Email" required>
            </div>
            <div class="Login-form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="Login-submit">
                <input type="submit" name="signIn" value="Đăng Nhập">
            </div>

            <?php
            if(isset($_GET['error'])) {
                echo "<div class='error-message'>" . $_GET['error'] . "</div>";
            }
            if(isset($_GET['success'])) {
                echo "<div class='success-message'>" . $_GET['success'] . "</div>";
            }
            ?>

            <p class="login-form-support">Don't have an account? <a href="/WEB_2/app/view/log/signup.php">Register</a></p>
        </div>
    </form> -->
