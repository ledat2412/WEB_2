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
                        <h3 style="font-weight: 400; font-size: 20px;">Bạn chắc chắn muốn xóa sản phẩm này?</h3>
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
                <a href="./admin.html">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/html/Quanlycauhinh.html">
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
                <a href="/admin/html/DonHang.html">
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
                    <h1>Danh Sách</h1>
                    <ul class="list-position">
                        <li>
                            <a href="/admin/html/admin.html">Home</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="">Danh Sách</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="Add-product-container">
                <div class="Add-product">
                    <a href="../html/ThemSanPhamMoi.php">
                        <button class="Add-product-content">
                            <span>
                                &#43; Thêm sản phẩm mới
                            </span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="Product-list-cotainer">
                <div class="Product-list-header">
                    <div>STT</div>
                    <div>Hình ảnh</div>
                    <div>Tên sản phẩm</div>
                    <div>Mã sản phẩm</div>
                    <div>Giá bán</div>
                    <div>Số lượng</div>
                    <div>Ngày đăng</div>
                    <div>Tác vụ</div>
                </div>
                <div class="Product-list-body">
                    <div class="Product-list-detail">1</div>
                        <div class="Product-list-detail">
                            <img src="/img/ABAS081-1.jpg">
                        </div>
                    <div class="Product-list-detail">Giày bóng rổ nam</div>
                    <div class="Product-list-detail">ABAS081-1</div>
                    <div class="Product-list-detail">1,953,000VND</div>
                    <div class="Product-list-detail">5</div>
                    <div class="Product-list-detail">29/10/2024</div>
                    <div class="Product-list-detail">
                        <a href="/admin/html/SuaSanPham.html">
                            <i class="fa-solid fa-pen-to-square"></i>&#160;
                        </a>
                        <a href="#warning-notify">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
                <div class="Product-list-body">
                    <div class="Product-list-detail">2</div>
                        <div class="Product-list-detail">
                            <img src="/img/ARZS003-13.jpg">
                        </div>
                    <div class="Product-list-detail">Giày bóng rổ nam</div>
                    <div class="Product-list-detail">ARZS003-13</div>
                    <div class="Product-list-detail">967,000VND</div>
                    <div class="Product-list-detail">5</div>
                    <div class="Product-list-detail">29/10/2024</div>
                    <div class="Product-list-detail">
                        <a href="/admin/html/SuaSanPham.html">
                            <i class="fa-solid fa-pen-to-square"></i>&#160;
                        </a>
                        <a href="#warning-notify">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
                <div class="Product-list-body">
                    <div class="Product-list-detail">3</div>
                        <div class="Product-list-detail">
                            <img src="/img/ARHT020-9V.jpg">
                        </div>
                    <div class="Product-list-detail">Giày chạy bộ nữ</div>
                    <div class="Product-list-detail">ARHT020-9V</div>
                    <div class="Product-list-detail">1,340,000VND</div>
                    <div class="Product-list-detail">5</div>
                    <div class="Product-list-detail">29/10/2024</div>
                    <div class="Product-list-detail">
                        <a href="/admin/html/SuaSanPham.html">
                            <i class="fa-solid fa-pen-to-square"></i>&#160;
                        </a>
                        <a href="#warning-notify">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
                <div class="Product-list-body">
                    <div class="Product-list-detail">4</div>
                        <div class="Product-list-detail">
                            <img src="/img/ABAS073-7.jpg">
                        </div>
                    <div class="Product-list-detail">Giày bóng rổ nam</div>
                    <div class="Product-list-detail">ABAS073-7</div>
                    <div class="Product-list-detail">2,455,000VND</div>
                    <div class="Product-list-detail">1</div>
                    <div class="Product-list-detail">29/10/2024</div>
                    <div class="Product-list-detail">
                        <a href="/admin/html/SuaSanPham.html">
                            <i class="fa-solid fa-pen-to-square"></i>&#160;
                        </a>
                        <a href="#warning-notify">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
                <div class="Product-list-body">
                    <div class="Product-list-detail">5</div>
                        <div class="Product-list-detail">
                            <img src="/img/ARPU001-6V.jpg">
                        </div>
                    <div class="Product-list-detail">Giày chạy bộ nam</div>
                    <div class="Product-list-detail">ARPU001-6V</div>
                    <div class="Product-list-detail">1,980,000VND</div>
                    <div class="Product-list-detail">10</div>
                    <div class="Product-list-detail">29/10/2024</div>
                    <div class="Product-list-detail">
                        <a href="/admin/html/SuaSanPham.html">
                            <i class="fa-solid fa-pen-to-square"></i>&#160;
                        </a>
                        <a href="#warning-notify">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src ="../../../public/js/admin.js"></script>
    <script src ="../../../public/js/chart-bar.js"></script>
    <script src="../../../public/js/Click.js"></script>
</body>
</html>