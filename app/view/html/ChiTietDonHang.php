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
        <div id="receipt" class="receipt-container">
        <div class="receipt-body">
            <?php
            // Lấy id_order từ GET hoặc POST (ví dụ: ?id_order=123)
            $order_id = isset($_GET['id_order']) ? intval($_GET['id_order']) : 0;
            $customer = [];
            $order_date = '';
            $products = [];
            $total = 0;
            if ($order_id > 0) {
                include_once '../../../app/model/database.php';
                include_once '../../../app/model/orders.php';
                $db = new database();
                $ordersModel = new Orders();

                // Lấy thông tin đơn hàng + user + address
                $order = $db->getData("SELECT o.*, u.username, u.email, a.address, a.phone FROM orders o 
                    JOIN users u ON o.id_user = u.id_users 
                    LEFT JOIN addresses a ON o.id_address = a.id_address 
                    WHERE o.id_order = $order_id");
                if ($order && isset($order[0])) {
                    $row = $order[0];
                    $customer['username'] = $row['username'];
                    $customer['email'] = $row['email'];
                    $customer['address'] = $row['address'];
                    $customer['phone'] = $row['phone'];
                    $order_date = $row['order_date'];
                }

                // KHÔNG gọi $ordersModel->getOrderItems nếu trong model có join bảng products!
                // Lấy danh sách sản phẩm chỉ từ order_items để tránh lỗi không có bảng products
                $products = [];
                $products = $db->getData("SELECT * FROM order_items WHERE id_order = '$order_id'");
            }
            ?>
            <div class="receipt-header">
                <ul class="receipt-title">
                    <li class="receipt-title-item">
                        <h1>Hóa đơn mua hàng</h1>
                    </li>
                    <li class="receipt-title-item">
                        <h2>Mã: <?php echo htmlspecialchars($order_id); ?></h2>
                    </li>
                    <li class="receipt-title-item">
                        <h4>Ngày: <?php echo htmlspecialchars($order_date); ?></h4>
                    </li>
                </ul>
                <div class="close-receipt">
                    <a href="javascript:void(0); return" id="close-receipt-popup">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>
            <div class="information">
                <div class="information-title">
                    <label class="information-label">Tên khách hàng</label>
                    <div class="information-input"><?php echo htmlspecialchars($customer['username'] ?? ''); ?></div>
                </div>
                <div class="information-title">
                    <label class="information-label">Email</label>
                    <div class="information-input"><?php echo htmlspecialchars($customer['email'] ?? ''); ?></div>
                </div>
                <div class="information-title">
                    <label class="information-label">Địa chỉ</label>
                    <div class="information-input"><?php echo htmlspecialchars($customer['address'] ?? ''); ?></div>
                </div>
                <div class="information-title">
                    <label class="information-label">Số điện thoại</label>
                    <div class="information-input"><?php echo htmlspecialchars($customer['phone'] ?? ''); ?></div>
                </div>
            </div>
            <div class="receipt-detail">
                <table class="receipt-table">
                    <thead>
                        <th class="receipt-table-header">Mã sản phẩm</th>
                        <th class="receipt-table-header">Số lượng</th>
                        <th class="receipt-table-header">Giá</th>
                    </thead>
                    <tbody>
                        <?php
                        // Lấy danh sách sản phẩm từ bảng order_items (không join bảng products)
                        $products = [];
                        if ($order_id > 0) {
                            $products = $db->getData("SELECT * FROM order_items WHERE id_order = '$order_id'");
                        }
                        if (!empty($products)) {
                            foreach ($products as $item) {
                                $line_total = $item['quantity'] * $item['price'];
                                $total += $line_total;
                                echo '<tr class="receipt-table-row">';
                                echo '<td class="receipt-table-item">' . htmlspecialchars($item['id_product']) . '</td>';
                                echo '<td class="receipt-table-item">' . htmlspecialchars($item['quantity']) . '</td>';
                                echo '<td class="receipt-table-item">' . number_format($item['price'], 0, ',', '.') . ' đ</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="3" style="text-align:center;">Không có sản phẩm</td></tr>';
                        }
                        ?>
                        <tr class="receipt-table-row">
                            <td></td>
                            <td style="font-size: 20px;">Tổng tiền: </td>
                            <td style="font-size: 20px;"><?php echo number_format($total, 0, ',', '.'); ?> đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                        <img src="/WEB_2/public/assets/img/ảnh đại diện.jpg" alt="ảnh đại diện">
                    </button>
                </a>
                <div class="button-infor">
                    <div class="infor-ava">
                        <label for="">Họ và Tên:</label>
                        <h3><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Chưa đăng nhập'; ?></h3>
                    </div>
                    <div class="infor-ava">
                        <label for="">Quyền hạn:</label>
                        <h3><?php echo isset($_SESSION['role']) ? htmlspecialchars($_SESSION['role']) : 'Admin'; ?></h3>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            <div class="heading-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="list-position">
                        <li>
                            <a href="../../view/html/admin.php">Dashboard</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="../../view/html/admin.php">Home</a>
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
                        <table class="table-user">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã đơn</td>
                                    <td>Tổng tiền</td>
                                    <td>Hóa đơn</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once '../../../app/model/database.php';
                                $db = new database();

                                // Lấy id_user từ GET
                                $id_user = isset($_GET['id_user']) ? intval($_GET['id_user']) : 0;

                                // Lấy danh sách đơn hàng của khách hàng này
                                $orders = $db->getData("SELECT * FROM orders WHERE id_user = $id_user ORDER BY order_date DESC");
                                $stt = 1;
                                if (!empty($orders)) {
                                    foreach ($orders as $order) {
                                        $order_id = $order['id_order'];
                                        // Tính tổng tiền của đơn hàng (tính từ các sản phẩm)
                                        $items = $db->getData("SELECT quantity, price FROM order_items WHERE id_order = $order_id");
                                        $total = 0;
                                        foreach ($items as $item) {
                                            $total += $item['quantity'] * $item['price'];
                                        }
                                        echo '<tr class="tr-row">';
                                        echo '<td>' . $stt++ . '</td>';
                                        echo '<td>' . $order_id . '</td>';
                                        echo '<td>' . number_format($total, 0, ',', '.') . ' đ</td>';
                                        // Nút hóa đơn, khi nhấn sẽ hiện popup #receipt
                                        echo '<td><a href="?id_order=' . $order_id . '#receipt"><i class="fa-solid fa-receipt"></i></a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="3" style="text-align:center;">Không có đơn hàng</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="exit-btn">
                        <button type="button" onclick="window.location=document.referrer ? document.referrer : '../../view/html/admin.php';">Thoát</button>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script src ="../../../public/assets/js/admin.js"></script>
    <script src ="../../../public/assets/js/chart-bar.js"></script>
    <script src="../../../public/assets/js/Click.js"></script>
    <script src="/WEB_2/public/assets/js/admin.js"></script>
    <script src="/WEB_2/public/assets/js/Click.js"></script>
    <script>
    // Khi nhấn icon hóa đơn sẽ hiện popup id="receipt"
    document.addEventListener('DOMContentLoaded', function() {
        var receiptLinks = document.querySelectorAll('.show-receipt');
        receiptLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('receipt').style.display = 'block';
            });
        });
        // Đóng popup khi nhấn nút đóng
        var closeReceipt = document.getElementById('close-receipt-popup');
        if (closeReceipt) {
            closeReceipt.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('receipt').style.display = 'none';
            });
        }
        // Ẩn popup khi load trang
        document.getElementById('receipt').style.display = 'none';

        // Nếu có id_order trên URL thì tự động mở popup
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('id_order')) {
            document.getElementById('receipt').style.display = 'block';
        }
    });
    </script>
</body>
</html>