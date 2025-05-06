<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <h2>Xin chào, <?php echo htmlspecialchars($username); ?>!</h2>
        <ul>
            <li><a href="/WEB_2/profile">Thông Tin Hạng Thành Viên</a></li>
            <li><a href="/WEB_2/address">Địa Chỉ</a></li>
            <li><a href="/WEB_2/order">Đơn Hàng</a></li>
            <li><a href="/WEB_2/notification">Đăng Kí Nhận Thông Báo</a></li>
            <li><a href="/WEB_2/logout">Đăng Xuất</a></li>
        </ul>
    </div>
</body>
</html> 