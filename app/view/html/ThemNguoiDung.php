<?php
include_once "../../../app/model/database.php";
include_once "../../../app/model/users.php";
include_once "../../../app/model/roles.php";

$db = new database();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = intval($_POST['role']);

    // Kiểm tra username hoặc email đã tồn tại chưa
    $check = $db->getData("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (!empty($check)) {
        $error = "Username hoặc email đã tồn tại!";
    } else {
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', $role)";
        if ($db->handle($sql)) {
            $success = "Thêm người dùng thành công!";
        } else {
            $error = "Có lỗi khi thêm người dùng!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin</title>
</head>
<body>
    <section id="sidebar">
        <a href="#" class="logo">
            <i class="fa-solid fa-cloud"></i>
            <span class="text">Lining</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="/WEB_2/admin/home">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/WEB_2/admin/users">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="/WEB_2/admin/products">
                    <i class="fa-solid fa-shop"></i>
                    <span class="text">Danh sách</span>
                </a>
            </li>
            <li>
                <a href="/WEB_2/admin/orders">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="text">Đơn hàng</span>
                </a>
            </li>
        </ul>
    </section>
    <section id="content">
        <nav>
            <a href="#">
                    <i class="fa-solid fa-bars"></i>
            </a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Tìm kiếm">
                    <button type="submit" class="button-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <a href="#" class="infor">
                <img src="/img/ảnh đại diện.jpg" alt="ảnh đại diện">
            </a>
        </nav>
        <main>
            <form id="addUsers" method="post" class="add-users">
                <div class="add-users-content">
                    <div class="add-users-heading">
                        <h3>Thêm người dùng</h3>
                    </div>
                    <div class="add-users-data">
                        <div class="add-data">
                            <input type="email" name="email"  placeholder="Nhập email">
                        </div>
                        <div class="add-data">
                            <input type="text" name="username"  minlength="7" placeholder="Tạo tên đăng nhập" >
                        </div>
                        <div class="add-data">
                            <input type="password" name="pass"  minlength="5" maxlength="15" placeholder="Tạo mật khẩu">
                        </div>
                        <!-- <div class="add-data">
                            <label>Vai trò</label>
                            <input type="radio" name="role_cbx" value="Admin" >Admin
                            <input type="radio" name="role_cbx" value="User" >User
                        </div> -->
                    </div>
                    <div class="add-users-submit">
                        <li>
                            <a href="/WEB_2/admin/users" class="first-child">Thoát
                            </a>
                        </li>
                        <li>
                            <input type="submit" name="adduser" value="Tạo tài khoản" class="last-child">
                        </li>
                    </div>
                </div>
            </form>
            <?php if (!empty($error)): ?>
                <div style="color:red;font-weight:bold;"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div style="color:green;font-weight:bold;"><?php echo $success; ?></div>
            <?php endif; ?>
        </main>
    </section>
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
</body>
</html>