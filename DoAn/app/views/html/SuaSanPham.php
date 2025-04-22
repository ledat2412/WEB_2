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
                <a href="../../views/html/Quanlycauhinh.php">
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
            <a href="#" class="infor">
                <img src="/img/ảnh đại diện.jpg" alt="ảnh đại diện">
            </a>
        </nav>
        <main>
            <div class="repair">
                <div class="repair-content">
                    <div class="repair-heading">
                        <span>Thông tin sản Phẩm<span>
                    </div>
                    <div class="repair-data">
                        <div class="repair-infor">
                            <label for="">Hình ảnh:</label>
                            <br>
                            <div class="image">
                                <img src="/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/Giày bóng rổ nam ABAS081-1.jpg" alt="anh">
                        </div>
                            </div>
                        <div class="repair-infor">
                            <label for="">Tên sản phẩm: </label>
                            <br>
                            <input type="text" value="Giày bóng rổ nam" readonly>
                        </div>
                        <div class="repair-infor">
                            <label for="">Mã sản phẩm: </label>
                            <br>
                            <input type="text" value="ABAS081-1" readonly>
                        </div>
                        <div class="repair-infor">
                            <label for="">Giá bán: </label>
                            <br>
                            <input type="text" value="1,953,000VND" readonly>
                        </div>
                        <div class="repair-infor">
                            <label for="">Số lượng: </label>
                            <br>
                            <input type="text" value="5" readonly>
                        </div>
                        <div class="repair-submit">
                            <a href="../../views/html/DanhSachSanPham.php" class="return">
                                <button>Thoát</button>
                            </a>
                            <a href="../../views/html/ChinhSuaSanPham.php" class="enter-repair">
                                <button>Sửa thông tin</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
</body>
</html>