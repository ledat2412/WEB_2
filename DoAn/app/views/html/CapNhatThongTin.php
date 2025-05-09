<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/admin.css">
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
                <a href="../../views/html/admin.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../../views/html/Quanlycauhinh.php#">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-shop"></i>
                    <span class="text">Danh sách</span>
                </a>
            </li>
            <li>
                <a href="#">
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
            <?php
            include_once "../../models/tables/users.php";
            include_once "../../models/tables/roles.php";

            $db = new database();
            $id = $_GET['get_id'];
            $role_id = $_GET['get_id_role'];
            if ($_SERVER['REQUEST_METHOD'] === "POST"){
                if (isset($_POST['update'])){
                    $up_username = $_POST['old_username'];
                    $up_email = $_POST['old_email'];
                    $up_pass = $_POST['old_pass'];
                    $up_role = $_POST['old_role'];
                    
                    $update_role = $db ->handle("UPDATE roles SET role_name = '$up_role' WHERE id_role ='$role_id'");
                    $update = $db -> handle("UPDATE user SET username = '$up_username', 
                                                    email = '$up_email', password = '$up_pass' WHERE id_users = '$id'");
                }
            }
            $result = $db ->getData("SELECT * FROM user u JOIN roles r ON u.role = r.id_role WHERE id_users = '$id'");
            if(!empty($result)){
            $data = $result[0];
            echo '<div id="updateUsers" class="update-users">';
                echo '<div class="update-users-content">';
                    echo '<div class="update-users-heading">';
                        echo '<h3>Cập nhật thông tin</h3>';
                    echo '</div>';
                    
                    echo '<form method="POST" class="update-users-data">';
                            echo '<div class="update-data">
                            <input type="text" placeholder="'.$data['id_users'].'"></div>';
                            echo '<div class="update-data">
                            <input type="text" name="old_username" placeholder="'.$data['username'].'"></div>';
                            echo '<div class="update-data">
                            <input type="email" name="old_email" placeholder="'.$data['email'].'"></div>';
                            echo '<div class="update-data">
                            <input type="password" name="old_pass" placeholder="'.$data['password'].'"></div>';
                            echo '<div class="update-data">';
                                // echo '<input type="radio" name="old_role" class="update-checkbox" value="Admin">';
                                // echo '<label>Admin</label>';
                                // echo '<input type="radio" name="old_role" class="update-checkbox" value="User">';
                                // echo '<label>User</label>';
                            echo '</div>';
                            echo '<div class="update-users-submit">';
                                echo '<li>';
                                    echo '<a href="../../views/html/Quanlycauhinh.php" class="first-child">Thoát</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<input type="submit" name="update" class="last-child" value ="Cập nhật"></input>';
                                echo '</li>';
                            echo '</div>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
            }
            ?>
        
        </main>
    </section>
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
</body>
</html>