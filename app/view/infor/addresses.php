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
</body>
</html> 