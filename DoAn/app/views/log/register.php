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
    <body class="Resister-body">
        <form action="../../contronllers/login_cookie.php" method="post" class="form-register">
            <div class="Resister-form-frame">
                <div class="form-heading">
                    <h1>Register</h1>
                </div>
                <div class="Resister-form-group">
                    <input type="text" name="user" class="user" placeholder="User Name" required>
                </div>
                <div class="Resister-form-group">
                    <input type="password" name="pass" class="pass" placeholder="Password" required>
                </div>
                <div class="Resister-form-group">
                    <input type="password" name="confirm_pass" class="pass" placeholder="Checking you password" required>
                </div>
                <div class="Resister-form-group">
                    <input type="text" name="phone" class="phone" placeholder="Phone" required>
                </div>
                <div class="Resister-form-group">
                    <input type="email" name="gmail" class="gmail" placeholder="Email" required>
                </div>
                <div class="Resister-form-group">
                    <span class="error" >
                        <?php 
                            if (!empty($nameError)) {
                                echo $nameError;
                            }
                        ?>
                    </span>
                </div>
                <div class="Resister-submit">
                    <input type="submit" name="btn" class="sub" value="Đăng Ký">
                </div>
                <p class="login-form-support">Already have an account? <a href="/web/log/Login.html"> Login</a></p>
            </div>
        </form>
    </body>
</html>