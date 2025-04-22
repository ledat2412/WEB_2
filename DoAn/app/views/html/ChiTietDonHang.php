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
                <a href="../../views/html/DanhSachSanPham.php">
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
            <div class="heading-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="list-position">
                        <li>
                            <a href="../../views/html/admin.php">Dashboard</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="../../views/html/admin.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="oder-detail-container">
                <div class="order-detail-header">
                    <span>Chi tiết đơn hàng</span>
                </div>
                <div class="order-detail-body">
                    <div class="order-infor">
                        <label class="order-title">Khách hàng</label>
                        <div class="order-input">ABC</div>
                        <label class="order-title">Số điện thoại</label>
                        <div class="order-input">01234</div>
                        <label class="order-title">Địa chỉ</label>
                        <div class="order-input">ABC</div>
                        <label class="order-title">Email</label>
                        <div class="order-input">abc@def</div>
                        <label class="order-title">Giao hàng</label>
                        <div class="order-input">Giao hàng tận nơi</div>
                    </div>
                    <div class="order-summary">
                        <div class="order-img">
                            <img src="/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/Giày bóng rổ nam ABAS071-5.jpg">
                        </div>
                        <div class="order-detail">
                            <span>Giày bóng rổ nam ABAS071-5</span><br>
                            <span>Số lượng: 1</span><br>
                            <span>Giá: 1 660 000</span>
                        </div>
                        <div class="order-total">
                            <span>Tổng: 1 660 000</span>
                        </div>
                    </div>
                    <div class="exit-btn">
                        <a href="../../views/html/DonHang.php">
                            <button>Thoát</button>
                        </a>
                    </div>
                </div>
            </div>
               
        </main>
    </section>
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
    <script src ="/admin/js/LocDonHang.js"></script>
</body>
</html>