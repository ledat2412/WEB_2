<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Git/public/css/signin.css">
    <link rel="stylesheet" href="/Git/public/css/base.css">
    <link rel="icon" href="/Git/public/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body class="body-login">
    <form method="post" action="/Git/app/model/controller/register.php" class="form-login">
        <div class="login-form-frame">
            <div class="back-button">
                <a href="/Git/app/controller/main.php?act=home"><i class="fa-solid fa-arrow-left"> Go back</i></a>
            </div>
            <div class="form-heading">
                <h1>Login</h1>
            </div>
            <div class="login-form-group">
                <input type="text" class="user" placeholder="Email" id="email" name="email" required>
            </div>
            <div class="login-form-group">
                <input type="password" class="pass" placeholder="Password" id="password" name="password" required>
            </div>
            <div>
                <p class="reset-password">
                    <a href="">Forgot password?</a>
                </p>
            </div>
            <div class="login-submit">
                <input type="submit" class="sub" value="sign In" name="signIn"> 
            </div>
            <p class="login-form-support">Don't have an account yet? <a href="/Git/app/view/log/signup.php"> Signup Now</a></p>
        </div>
    </form>
</body>
<script src="/Git/public/js/script.js"></script>

</html>