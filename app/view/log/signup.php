<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/signup.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="Resister-body">
    <form method="post" action="/WEB_2/app/controller/Auth.php" class="form-register">
        <div class="Resister-form-frame">
            <div class="back-button">
                <a href="/WEB_2/Lining"><i class="fa-solid fa-arrow-left"> Go back</i></a>
            </div>
            <div class="form-heading">
                <h1>Register</h1>
            </div>
            <div class="Resister-form-group">
                <input type="text" class="user" name="username" placeholder="User Name" required>
            </div>
            <div class="Resister-form-group">
                <input type="password" class="pass" name="password" placeholder="Password" required>
            </div>
            <div class="Resister-form-group">
                <input type="password" class="pass" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <div class="Resister-form-group">
                <input type="email" class="gmail" name="email" placeholder="Email" required>
            </div>
            <?php
            if(isset($_GET['error'])) {
                echo "<div class='error-message'>" . $_GET['error'] . "</div>";
            }
            if(isset($_GET['success'])) {
                echo "<div class='success-message'>" . $_GET['success'] . "</div>";
            }
            ?>
            <div class="Resister-submit">
                <input type="submit" class="sub" name="signUp" value="Đăng Ký">
            </div>
            <p class="login-form-support">Already have an account? <a href="/WEB_2/login">Login</a></p>
        </div>
    </form>
</body>

</html>