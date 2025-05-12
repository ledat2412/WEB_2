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
    <div id="receipt" class="receipt-container">
        <div class="receipt-body">
            <div class="receipt-header">
                <ul class="receipt-title">
                    <li class="receipt-title-item">
                        <h1>Hóa đơn mua hàng</h1>
                    </li>
                    <li class="receipt-title-item">
                        <h2 id="receipt-order-id">Mã: ---</h2>
                    </li>
                    <li class="receipt-title-item">
                        <h4 id="receipt-order-date">Ngày: ---</h4>
                    </li>
                </ul>
                <div class="close-receipt">
                    <a href="javascript:void(0);" id="close-receipt">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>
            <div class="information" id="receipt-customer-info">
                <!-- Thông tin khách hàng sẽ được load bằng JS -->
            </div>
            <div class="receipt-detail">
                <table class="receipt-table">
                    <thead>
                        <th class="receipt-table-header">Sản phẩm</th>
                        <th class="receipt-table-header">Số lượng</th>
                        <th class="receipt-table-header">Thành tiền</th>
                    </thead>
                    <tbody id="receipt-product-list">
                        <!-- Sản phẩm sẽ được load bằng JS -->
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
                            <a href="../../view/html/admin.php">Thống kê</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="../../view/html/admin.php">Home</a>
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
            <form method="GET" action="/WEB_2/admin/home" class="datetime" style="margin-bottom: 20px;">
                Từ: 
                <input type="date" name="from_date" value="<?php echo isset($_GET['from_date']) ? htmlspecialchars($_GET['from_date']) : ''; ?>">
                &nbsp;&nbsp;Đến: 
                <input type="date" name="to_date" value="<?php echo isset($_GET['to_date']) ? htmlspecialchars($_GET['to_date']) : ''; ?>">
                &nbsp;&nbsp;<button type="submit" name="statistic">Thống kê</button>
            </form>
            <div class="customer-chart-container">
                
                <table class="table-user">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Tổng tiền</td>
                            <td>Hóa đơn</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once '../../../app/model/database.php';
                        $stt = 1;
                        $data = [];

                        if (
                            isset($_GET['statistic']) &&
                            !empty($_GET['from_date']) &&
                            !empty($_GET['to_date'])
                        ) {
                            $startDate = $_GET['from_date'] . " 00:00:00";
                            $endDate = $_GET['to_date'] . " 23:59:59";
                            $db = new database();
                            // Lấy tổng tiền từng user trong khoảng thời gian
                            $sql = "SELECT 
                                        u.id_users,
                                        u.username,
                                        u.email,
                                        SUM(oi.price * oi.quantity) AS total_purchase
                                    FROM orders o 
                                    JOIN users u ON o.id_user = u.id_users
                                    JOIN order_items oi ON o.id_order = oi.id_order
                                    WHERE o.order_date >= ? AND o.order_date <= ?
                                    GROUP BY u.id_users, u.username, u.email
                                    ORDER BY total_purchase DESC
                                    LIMIT 5";
                            $conn = $db->connect();
                            $stmt = $conn->prepare($sql);
                            if ($stmt) {
                                $stmt->bind_param("ss", $startDate, $endDate);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $data = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
                                $stmt->close();
                            }
                        }

                        if (!empty($data)) {
                            foreach ($data as $row) {
                                echo '<tr>';
                                echo '<td>' . $stt++ . '</td>';
                                echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                echo '<td>' . number_format($row['total_purchase'], 0, ',', '.') . ' đ</td>';
                                // Sửa đường dẫn chi tiết hóa đơn sang dạng rewrite
                                echo '<td><a href="/WEB_2/admin/orders/detail?id_user=' . $row['id_users'] . '&from=' . htmlspecialchars($_GET['from_date']) . '&to=' . htmlspecialchars($_GET['to_date']) . '" target="_blank">Chi tiết</a></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5" style="text-align:center;">Vui lòng chọn khoảng thời gian và nhấn Thống kê</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            </div>
        </main>
    </section>
    <script src ="../../../public/js/admin.js"></script>
    <script src ="../../../public/js/chart-bar.js"></script>
    <script src="../../../public/js/Click.js"></script>
    <script>
    // Hiện popup hóa đơn chi tiết từng đơn hàng
    document.addEventListener('DOMContentLoaded', function() {
        // Gắn sự kiện cho các nút "Chi tiết" trong bảng khách hàng
        document.querySelectorAll('a[href^="ChiTietDonHang.php"], a.show-receipt').forEach(function(link) {
            link.addEventListener('click', function(e) {
                // Nếu là link mở tab mới thì bỏ qua
                if (this.target === '_blank') return;
                e.preventDefault();
                // Lấy id_user hoặc id_order từ data hoặc url
                let url = this.getAttribute('href');
                let params = new URLSearchParams(url.split('?')[1]);
                let id_order = this.dataset.orderid || params.get('id_order');
                let id_user = this.dataset.userid || params.get('id_user');
                // Ưu tiên lấy id_order, nếu không có thì lấy id_user và lấy đơn hàng đầu tiên của user
                if (id_order) {
                    showReceiptDetail(id_order);
                } else if (id_user) {
                    fetch('../../../app/view/html/get_first_order_of_user.php?id_user=' + id_user)
                        .then(res => res.json())
                        .then(data => {
                            if (data.id_order) showReceiptDetail(data.id_order);
                        });
                }
            });
        });

        // Đóng popup
        document.getElementById('close-receipt').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('receipt').style.display = 'none';
        });

        // Hàm load chi tiết hóa đơn
        function showReceiptDetail(id_order) {
            fetch('../../../app/view/html/order_detail_ajax.php?id_order=' + id_order)
                .then(res => res.json())
                .then(data => {
                    // Hiển thị mã hóa đơn và ngày
                    document.getElementById('receipt-order-id').innerText = 'Mã: ' + (data.id_order || '---');
                    document.getElementById('receipt-order-date').innerText = 'Ngày: ' + (data.order_date || '---');
                    // Hiển thị thông tin khách hàng
                    let infoHtml = '';
                    infoHtml += '<div class="information-title"><label class="information-label">Khách hàng</label><div class="information-input">' + (data.username || '') + '</div></div>';
                    infoHtml += '<div class="information-title"><label class="information-label">Email</label><div class="information-input">' + (data.email || '') + '</div></div>';
                    infoHtml += '<div class="information-title"><label class="information-label">Số điện thoại</label><div class="information-input">' + (data.phone || '') + '</div></div>';
                    infoHtml += '<div class="information-title"><label class="information-label">Địa chỉ</label><div class="information-input">' + (data.address || '') + '</div></div>';
                    document.getElementById('receipt-customer-info').innerHTML = infoHtml;
                    // Hiển thị danh sách sản phẩm
                    let tbody = document.getElementById('receipt-product-list');
                    tbody.innerHTML = '';
                    let total = 0;
                    if (data.items && data.items.length > 0) {
                        data.items.forEach(function(item) {
                            let line_total = item.quantity * item.price;
                            total += line_total;
                            let tr = document.createElement('tr');
                            tr.className = 'receipt-table-row';
                            tr.innerHTML = '<td class="receipt-table-item">' + (item.product_name || '') + '</td>' +
                                '<td class="receipt-table-item">' + item.quantity + '</td>' +
                                '<td class="receipt-table-item">' + Number(line_total).toLocaleString() + ' đ</td>';
                            tbody.appendChild(tr);
                        });
                    } else {
                        let tr = document.createElement('tr');
                        tr.innerHTML = '<td colspan="3" style="text-align:center;">Không có sản phẩm</td>';
                        tbody.appendChild(tr);
                    }
                    // Tổng tiền
                    let totalRow = document.createElement('tr');
                    totalRow.className = 'receipt-table-row';
                    totalRow.innerHTML = '<td></td><td style="font-size: 20px;">Tổng tiền: </td><td style="font-size: 20px;">' + total.toLocaleString() + ' đ</td>';
                    tbody.appendChild(totalRow);
                    document.getElementById('receipt').style.display = 'block';
                });
        }
    });
    </script>
</body>
</html>