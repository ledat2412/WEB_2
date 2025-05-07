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
        <div id="warning-notify" class="warning-notify-container notify-container">
            <div class="warning-content">
                <div class="warning-header">
                    <span>
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Thông báo
                    </span>
                </div>
                <div class="warning-body">
                    <span>
                        <h3 style="font-weight: 400; font-size: 20px;">Bạn chắc chắn muốn xóa?</h3>
                    </span>
                    <a href="#">
                        <button class="warning-btn">Có</button>
                    </a>
                    <a href="#">
                        <button class="warning-btn">Không</button>
                    </a>
                </div>
            </div>
        </div>
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
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="../../views/html/DanhSachSanPham.php">
                    <i class="fa-solid fa-shop"></i>
                    <span class="text">Danh sách</span>
                </a>
            </li>
            <li>
                <a href="../../views/html/DonHang.php">
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
            <div class="image-contain">
                <a href="#" class="infor">
                    <button class="Button">
                        <img src="/img/ảnh đại diện.jpg" alt="ảnh đại diện">
                    </button>
                </a>
                <div class="button-infor">
                    <div class="infor-ava">
                        <label for="">Họ và Tên:</label>
                        <h3>Tôn Quyền</h3>
                    </div>
                    <div class="infor-ava">
                        <label for="">Quyền hạn:</label>
                        <h3>Admin</h3>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            <div class="heading-title">
                <div class="left">
                    <h1>Users</h1>
                    <ul class="list-position">
                        <li>
                            <a href="../../views/html/admin.php">Home</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="../../views/html/Quanlycauhinh.php#">Users</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="box-tool">
                <li>
                    <a href="../../views/html/CapNhatThongTin.php">
                        <h3><i class="fa-light fa-plus"></i>Cập nhật dữ liệu</h3>
                    </a>
                </li>
                <li>
                    <a href="../../views/html/ThemNguoiDung.php#">
                        <h3><i class="fa-light fa-plus"></i>Thêm thông tin</h3>
                    </a>
                </li>
            </ul>

            <table class="table-user">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Họ và tên</td>
                        <td>Số điện thoại</td>
                        <td>Địa chỉ</td>
                        <td>Tình trạng</td>
                        <td>Tác vụ</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                        include_once "../../models/tables/database.php";

                        $db = new database();

                        $result = $db ->getData("SELECT * FROM user u JOIN roles r ON u.role = r.id_role");
                        if(!empty($result)){
                            foreach($result as $data){
                        
                    ?>
                        <tr class="tr-row">
                            <td data-label="STT"><?php echo $data['id_users'] ?></td>
                            <td data-label="Tên đăng nhập"><?php echo $data['username'] ?></td>
                            <td data-label="Email"><?php echo $data['email'] ?></td>
                            <td data-label="Mật khẩu"><?php echo $data['password'] ?></td>
                            <td data-label="Vai trò"><?php echo $data['role_name'] ?></td>
                            <td data-label="Trạng thái">
                                <i id="icon" class="fa-solid fa-lock" onclick="toggleIcon(this)"></i>
                            </td>
                            <td data-label="Tác vụ">
                                <a href = "XoaUser.php?get_id = <?php echo $data['id_users'] ?>" onclick="openPopup()">
                                    <i class="fa-regular fa-x"></i>
                                </a>
                            </td>
                        </tr>
                    <?php  }} 
                            ?>
                </tbody>
            </table>
        </main>
    </section>
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
    <script src ="/admin/js/Quanlycauhinh.js"></script>
    <script src = "/admin/js/Click.js"></script>
</body>
</html>
