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
                <a href="/admin/html/Quanlycauhinh.html">
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
                    <h1>Thống kê</h1>
                    <ul class="list-position">
                        <li>
                            <a href="/admin/html/admin.html">Thống kê</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="/admin/html/admin.html">Home</a>
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

            <div class="chart-datetime">
                <div class="datetime">
                    <input type="date">
                    <input type="date">
                </div>
                
            </div>

            <div class="chart">
                <canvas id="chart-bar">
                </canvas>
            </div>

            <div class="chart-datetime">
                <div class="datetime">
                    <input type="date">
                    <input type="date">
                </div>
            </div>


            <div class="customer-chart-container">

                <div class="char-title">
                    <h3>Doanh thu</h3>
                </div>

                <div class="customer-chart">
                    <a class="customer-chart-col" style="--percent: 88%; --color: #99FFFF" href="#top-customer">
                        <div class="data-container">
                            <ul class="data">
                                <li class="data-item">Doanh thu: 26 triệu</li>
                            </ul>
                        </div>
                    </a>
                    <a class="customer-chart-col" style="--percent: 17%; --color: #CCFF66" href="#top-customer">
                        <div class="data-container">
                            <ul class="data">
                                <li class="data-item">Doanh thu: 5 triệu</li>
                            </ul>
                        </div>
                    </a>
                    <a class="customer-chart-col" style="--percent: 40%; --color: #FFCC33" href="#top-customer">
                        <div class="data-container">
                            <ul class="data">
                                <li class="data-item">Doanh thu: 10 triệu</li>
                            </ul>
                        </div>
                    </a>
                    <a class="customer-chart-col" style="--percent: 60%; --color: #FF9933" href="#top-customer">
                        <div class="data-container">
                            <ul class="data">
                                <li class="data-item">Doanh thu: 15 triệu</li>
                            </ul>
                        </div>
                    </a>
                    <a class="customer-chart-col" style="--percent: 100%; --color: #DDDDDD" href="#top-customer">
                        <div class="data-container">
                            <ul class="data">
                                <li class="data-item">Doanh thu: 30 triệu</li>
                            </ul>
                        </div>
                    </a>
                </div>

                <div class="time-container">
                    <div>Tôn Quyền</div>
                    <div>Đức Đạt</div>
                    <div>Phương Nhi</div>
                    <div>Võ Thị Thương</div>
                    <div>Minh Huy</div>
                </div>
                <div class="stat-container">
                    <ul class="stat">
                        <li>0</li>
                        <li>5</li>
                        <li>10</li>
                        <li>15</li>
                        <li>20</li>
                        <li>25</li>
                        <li>30</li>
                    </ul>
                </div>
            </div>

            <div class="detail">
                <div class="left">
                    <div class="recent-orders">
                        <h3>Recent-orders</h3>
                        <a href="/admin/html/DonHang.html">
                            <h3>View all</h3>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Model</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ARMT037-1</td>
                                <td>1,850,000₫</td>
                                <td>Cash</td>
                                <td>Delivered</td>
                            </tr>
                            <tr>
                                <td>ARPU001-6V</td>
                                <td>2,556,000₫</td>
                                <td>Transfer</td>
                                <td>In progress</td>
                            </tr>
                            <tr>
                                <td>ABAS081-1</td>
                                <td>1,953,000₫</td>
                                <td>Cash</td>
                                <td>Return</td>
                            </tr>
                            <tr>
                                <td>ABAS071-5</td>
                                <td>2,435,000₫</td>
                                <td>Cash</td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td>ABPS039-4</td>
                                <td>1,561,000₫</td>
                                <td>Transfer</td>
                                <td>Delivered</td>
                            </tr>
                            <tr>
                                <td>AGLT179-3V</td>
                                <td>663,709₫</td>
                                <td>Transfer</td>
                                <td>Return</td>
                            </tr>
                            <tr>
                                <td>AGLU009-1V</td>
                                <td>1,367,673₫</td>
                                <td>Transfer</td>
                                <td>In progress</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="right">
                    <div class="recent-customers">
                        <h3>Recent-customers</h3>
                        <a href="/admin/html/Quanlycauhinh.html#">
                            <h3>View all</h3>
                        </a>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <div class="image">
                                    <img src="/img/siunhancam.jpg" alt="">
                                </div>
                            </td>
                            <td><h3>Tôn Quyền<br><span>VietNam</span></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="image">
                                    <img src="/img/siunhanden.jpg" alt="">
                                </div>
                            </td>
                            <td><h3>Võ Thị Thương<br><span>VietNam</span></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="image">
                                    <img src="/img/siunhando.jpg" alt="">
                                </div>
                            </td>
                            <td><h3>Lý Minh Huy<br><span>VietNam</span></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="image">
                                    <img src="/img/siunhanvang.jpg" alt="">
                                </div>
                            </td>
                            <td><h3>Đức Đạt<br><span>VietNam</span></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="image">
                                    <img src="/img/siunhanxanh.jpg" alt="">
                                </div>
                            </td>
                            <td><h3>Phương Nhi<br><span>VietNam</span></h3></td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
    </section>
    <script src ="../../../public/js/admin.js"></script>
    <script src ="../../../public/js/chart-bar.js"></script>
    <script src="../../../public/js/Click.js"></script>
</body>
</html>