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
        <div id="edit-product" class="edit-product-container">
            <div class="edit-content">
                <div class="edit-header">
                    <span>
                        <i class="fa-solid fa-circle-info"></i>
                        Thông tin sản phẩm
                    </span>
                </div>
                <div class="edit-body-container">
                    <div class="edit-body-contain">
                        <div class="edit-body">
                            <div class="form-row">
                                <label class="form-title"><sup>&#8727;</sup>Tên sản phẩm</label>
                                <input class="form_input" type="text" placeholder="&#160;Giày bóng rổ nam">
                            </div>
                            <div class="form-row">
                                <label class="form-title"><sup>&#8727;</sup>Mã sản phẩm</label>
                                <input class="form_input" type="text" placeholder="&#160;ABAS081-1">
                            </div>
                            <div class="form-row">
                                <label class="form-title"><sup>&#8727;</sup>Giá bán</label>
                                <input class="form_input" type="text" placeholder="&#160;1,953,000VND">
                            </div>
                            <div class="form-row">
                                <label class="form-title"><sup>&#8727;</sup>Ngày đăng</label>
                                <input class="form_input" type="text" placeholder="&#160;21/10/2024">
                            </div>
                            <div class="form-row">
                                <label class="form-title"><sup>&#8727;</sup>Số lượng</label>
                                <input class="form_input" type="text" placeholder="&#160;5">
                            </div>
                        </div>
                        <div class="upload-image-container">
                            <input type="file" id="Upload" accept="image/png, image/jpg">
                            <label for="Upload" class="Upload-area">
                                <img src="/img/Upload_Img.jpg">
                                Click here to upload your image
                            </label>
                        </div>
                    </div>
                    <div class="Save-btn">
                        <a href="../../views/html/SuaSanPham.php">
                            <button>Thoát</button>
                        </a>
                        <a href="../../views/html/DanhSachSanPham.php">
                            <button>Lưu</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
</body>
</html>