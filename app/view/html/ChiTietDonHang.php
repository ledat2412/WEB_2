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
                    <a href="javascript:void(0);" id="close-receipt-popup">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div> -->
                <div id="receipt" style="display:none;">
    <a href="#" id="close-receipt-popup">Đóng</a>
    <iframe id="receipt-iframe" src="" style="width:100%; height:500px; border:none;"></iframe>
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
        <div class="receipt-footer">
            <?php
// Kiểm tra có tham số id_order và đảm bảo là số
if (isset($_GET['id_order']) && is_numeric($_GET['id_order'])) {
    $order_id = (int) $_GET['id_order'];

    // Lấy dữ liệu từ các hàm xử lý (giả định các hàm này đã được định nghĩa và hoạt động)
    $order = $orders->getOrderById($order_id);
    $items = $orders->getOrderItems($order_id);
    $user = $orders->getUserByOrderId($order_id);
    $address = $orders->getAddressByOrderId($order_id);

    // Kiểm tra dữ liệu tồn tại
    if (!$order || !$items) {
        echo "<p style='color:red;'>Không tìm thấy thông tin đơn hàng.</p>";
        exit;
    }

    // Gộp thông tin người dùng và địa chỉ
    $customer = [
        'username' => !empty($user[0]['username']) ? $user[0]['username'] : 'Không xác định',
        'email'    => !empty($user[0]['email']) ? $user[0]['email'] : 'Không xác định',
        'address'  => !empty($address[0]['address']) ? $address[0]['address'] : 'Không xác định'
    ];

    // Tính tổng tiền
    $total = 0;
    foreach ($items as $item) {
        $total += $item['quantity'] * $item['price'];
    }
?>
    <div id="receipt" style="font-family: Arial, sans-serif; max-width: 800px; margin: auto;">
        <h2>HÓA ĐƠN MUA HÀNG</h2>

        <p><strong>Khách hàng:</strong> <?= htmlspecialchars($customer['username']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></p>
        <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($customer['address']) ?></p>
        <p><strong>Ngày đặt hàng:</strong> <?= htmlspecialchars($order['order_date']) ?></p>
        <p><strong>Trạng thái:</strong> <?= htmlspecialchars($order['status']) ?></p>

        <br>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tạm tính</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['product_name']) ?></td>
                        <td><?= (int) $item['quantity'] ?></td>
                        <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                        <td><?= number_format($item['quantity'] * $item['price'], 0, ',', '.') ?> VNĐ</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" align="right"><strong>Tổng cộng:</strong></td>
                    <td><strong><?= number_format($total, 0, ',', '.') ?> VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "<p style='color:red;'>Thiếu mã đơn hàng hợp lệ.</p>";
}
?>

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
                                        echo '<td><a href="#" class="show-receipt" data-orderid="' . $order_id . '"><i class="fa-solid fa-receipt"></i></a></td>';
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
                var id_order = this.getAttribute('data-orderid');
                if (id_order) {
                    // Thay đổi URL để truyền id_order lên, reload lại trang với id_order mới
                    var url = new URL(window.location.href);
                    url.searchParams.set('id_order', id_order);
                    window.location.href = url.toString();
                }
                if (id_order) {
                    // Thay đổi URL để truyền id_order lên, reload lại trang với id_order mới
                    var url = new URL(window.location.href);
                    url.searchParams.set('id_order', id_order);
                    window.location.href = url.toString();
                }
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
<!-- 
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var receiptLinks = document.querySelectorAll('.show-receipt');
    receiptLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var id_order = this.getAttribute('data-orderid');
            if (id_order) {
                // Mở popup và truyền ID đơn hàng vào URL của iframe
                document.getElementById('receipt').style.display = 'block';
                document.getElementById('receipt-iframe').src = 'receipt.php?id_order=' + id_order;
            }
        });
    });

    var closeReceipt = document.getElementById('close-receipt-popup');
    if (closeReceipt) {
        closeReceipt.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('receipt').style.display = 'none';
        });
    }

    // Ẩn popup khi load trang
    document.getElementById('receipt').style.display = 'none';
});
</script> -->

</body>
</html>