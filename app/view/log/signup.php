<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="/Git/public/css/signup.css">
    <link rel="stylesheet" href="/Git/public/css/base.css">
    <link rel="icon" href="/Git/public/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="Resister-body">
    <form method="POST" action="/Git/app/controller/register.php" class="form-register">
        <div class="Resister-form-frame">
            <div class="back-button">
                <a href="/Git/app/controller/main.php?act=home"><i class="fa-solid fa-arrow-left"> Go back</i></a>
            </div>
            <div class="form-heading">
                <h1>Register</h1>
            </div>
            <?php if(isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['success'])): ?>
                <div class="success-message">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>
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
            <div class="Resister-submit">
                <input type="submit" class="sub" name="signUp" value="Đăng Ký">
            </div>
            <p class="login-form-support">Already have an account? <a href="/Git/app/view/log/signin.php">Login</a></p>
        </div>
    </form>
</body>

</html>