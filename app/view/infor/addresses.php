<?php
require_once '../model/users.php';
require_once '../model/addresses.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Lấy danh sách địa chỉ
$addressModel = new Addresses();
$addresses = $addressModel->getAddressesByUser($user_id);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Người Dùng</title>
    <link rel="stylesheet" href="/web/Web.css">
    <link rel="stylesheet" href="thongtincanhan.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="sidebar">
                <h2>Xin chào, <?php echo htmlspecialchars($username); ?>!</h2>
                <ul>
                    <li><a href="#">Thông Tin Hạng Thành Viên</a></li>
                    <li><a href="/infor/thongtincanhan.php">Thông Tin Cá Nhân</a></li>
                    <li><a href="/infor/lichsu.php">Đơn Hàng</a></li>
                    <li><a href="/infor/diachi.php">Địa Chỉ</a></li>
                    <li><a href="#">Đăng Kí Nhận Thông Báo</a></li>
                    <li><a href="/web/Web.html">Đăng Xuất</a></li>
                </ul>
            </div>
            <div class="main-content-infor">
                <h2>Địa chỉ của bạn</h2>
                <?php if ($addresses && count($addresses) > 0): ?>
                    <table class="address-table">
                        <tr>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                        </tr>
                        <?php foreach ($addresses as $address): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($address['address']); ?></td>
                                <td><?php echo htmlspecialchars($address['phone']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Bạn chưa có địa chỉ nào.</p>
                    <a href="/infor/diachi.php"><button>Thêm địa chỉ</button></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html> 