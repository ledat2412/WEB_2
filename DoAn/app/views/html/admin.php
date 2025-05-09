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
    <div id="receipt" class="receipt-container">
        <div class="receipt-body">
            <div class="receipt-header">
                <ul class="receipt-title">
                    <li class="receipt-title-item">
                        <h1>Hóa đơn mua hàng</h1>
                    </li>
                    <li class="receipt-title-item">
                        <h2>Mã: 3123411115</h2>
                    </li>
                    <li class="receipt-title-item">
                        <h4>Ngày: 21/10/2024</h4>
                    </li>
                </ul>
                <div class="close-receipt">
                    <a href="#top-customer">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>
            <div class="information">
                <div class="information-title">
                    <label class="information-label">Khách hàng</label>
                    <div class="information-input">Lý Minh Huy</div>
                </div>
                <div class="information-title">
                    <label class="information-label">Mã khách hàng</label>
                    <div class="information-input">3123411115</div>
                </div>
                <div class="information-title">
                    <label class="information-label">Số điện thoại</label>
                    <div class="information-input">0931792138</div>
                </div>
                <div class="information-title">
                    <label class="information-label">Địa chỉ</label>
                    <div class="information-input">112/24/20 An Bình P5 Q5</div>
                </div>
            </div>
            <div class="receipt-detail">
                <table class="receipt-table">
                    <thead>
                        <th class="receipt-table-header">Sản phẩm</th>
                        <th class="receipt-table-header">Số lượng</th>
                        <th class="receipt-table-header">Thành tiền</th>
                    </thead>
                    <tbody>
                        <tr class="receipt-table-row">
                            <td class="receipt-table-item">ARPU001-6V</td>
                            <td class="receipt-table-item">5</td>
                            <td class="receipt-table-item">10.000.000</td>
                        </tr>
                        <tr class="receipt-table-row">
                            <td class="receipt-table-item">ABAS081-1</td>
                            <td class="receipt-table-item">5</td>
                            <td class="receipt-table-item">10.000.000</td>
                        </tr>
                        <tr class="receipt-table-row">
                            <td class="receipt-table-item">ARZS003-13</td>
                            <td class="receipt-table-item">5</td>
                            <td class="receipt-table-item">5.000.000</td>
                        </tr>
                        <tr class="receipt-table-row">
                            <td class="receipt-table-item">ARHT020-9V</td>
                            <td class="receipt-table-item">5</td>
                            <td class="receipt-table-item">5.000.000</td>
                        </tr>
                        <tr class="receipt-table-row">
                            <td class="receipt-table-item"></td>
                            <td class="receipt-table-item" style="font-size: 20px;">Tổng tiền: </td>
                            <td class="receipt-table-item" style="font-size: 20px;">30.000.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="top-customer" class="top-customer-list-container">
        <div class="top-customer-list">
            <div class="top-customer-list-header">
                <h3>Khách hàng tiềm năng</h3>
                <div class="close">
                    <a href="">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>
            <div class="top-customer-list-body">
                <table class="top-customer-list-table">
                    <theading>
                        <th class="top-customer-list-table-header">STT</th>
                        <th class="top-customer-list-table-header">Khách hàng</th>
                        <th class="top-customer-list-table-header">Doanh thu</th>
                        <th class="top-customer-list-table-header">Hóa đơn</th>
                    </theading>
                    <tbody>
                        <tr class="top-customer-list-table-row">
                            <td class="top-customer-list-table-data">1</td>
                            <td class="top-customer-list-table-data">Minh Huy</td>
                            <td class="top-customer-list-table-data">30.000.000</td>
                            <td class="top-customer-list-table-data">
                                <a href="#receipt">
                                    <i class="fa-solid fa-receipt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="top-customer-list-table-row" style="background-color: #f8f6f6;">
                            <td class="top-customer-list-table-data">2</td>
                            <td class="top-customer-list-table-data">Tôn Quyền</td>
                            <td class="top-customer-list-table-data">26.000.000</td>
                            <td class="top-customer-list-table-data">
                                <a href="#receipt">
                                    <i class="fa-solid fa-receipt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="top-customer-list-table-row">
                            <td class="top-customer-list-table-data">3</td>
                            <td class="top-customer-list-table-data">Võ Thị Thương</td>
                            <td class="top-customer-list-table-data">15.000.000</td>
                            <td class="top-customer-list-table-data">
                                <a href="#receipt">
                                    <i class="fa-solid fa-receipt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="top-customer-list-table-row" style="background-color: #f8f6f6">
                            <td class="top-customer-list-table-data">4</td>
                            <td class="top-customer-list-table-data">Phương Nhi</td>
                            <td class="top-customer-list-table-data">10.000.000</td>
                            <td class="top-customer-list-table-data">
                                <a href="#receipt">
                                    <i class="fa-solid fa-receipt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="top-customer-list-table-row">
                            <td class="top-customer-list-table-data">5</td>
                            <td class="top-customer-list-table-data">Đức Đạt</td>
                            <td class="top-customer-list-table-data">5.000.000</td>
                            <td class="top-customer-list-table-data">
                                <a href="#receipt">
                                    <i class="fa-solid fa-receipt"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <section id="sidebar">
        <a href="#" class="logo">
            <i class="fa-solid fa-cloud"></i>
            <span class="text">Lining</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
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
                    <h1>Thống kê</h1>
                    <ul class="list-position">
                        <li>
                            <a href="../../views/html/admin.php">Thống kê</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="../../views/html/admin.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="box-infor">
                <li>
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span class="text">
                        <h3>Đơn hàng mới</h3>
                        <p>1024</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-bag-shopping"></i>
                    <span class="text">
                        <h3>Khách hàng</h3>
                        <p>160.504</p>
                    </span>
                </li>
                <li>
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span class="text">
                        <h3>Sản phẩm</h3>
                        <p>5</p>
                    </span>
                </li>
                <li>
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span class="text">
                        <h3>Doanh thu</h3>
                        <p>57.6 Triệu</p>
                    </span>
                </li>
            </ul>

            <!-- <div class="chart-datetime">
                <div class="datetime">
                    <input type="date">
                    <input type="date">
                </div>
                
            </div>

            <div class="chart">
                <canvas id="chart-bar">
                </canvas>
            </div> -->

            <div class="chart-datetime">
                <div class="datetime">
                    <input type="date">
                    <input type="date">
                </div>
            </div>


            <div class="customer-chart-container">
                <table class="statis_table">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </main>
    </section>
    <script src ="../../../public/js/admin.js"></script>
    <script src ="../../../public/js/chart-bar.js"></script>
    <script src="../../../public/js/Click.js"></script>
</body>
</html>