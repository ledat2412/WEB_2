<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hạng Thành Viên</title>
    <link rel="stylesheet" href="/web/Web.css">
    <link rel="stylesheet" href="thongtincanhan.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        .tier-box {background: #fff; border-radius: 10px; padding: 30px; margin: 40px auto; max-width: 600px; box-shadow: 0 2px 8px #ccc; text-align: center;}
        .tier-title {font-size: 2rem; margin-bottom: 10px;}
        .tier-level {font-size: 1.5rem; color: #e6b800; margin-bottom: 10px;}
        .tier-point {font-size: 1.2rem; color: #555; margin-bottom: 20px;}
        .tier-table {width: 100%; border-collapse: collapse; margin-top: 30px;}
        .tier-table th, .tier-table td {padding: 12px 8px; border-bottom: 1px solid #eee;}
        .tier-table th {background: #f5f5f5;}
        .tier-table tr.active {background: #ffe066; font-weight: bold;}
        .tier-table tr.active td {color: #222;}
        .tier-icon {font-size: 1.3em; margin-right: 8px;}
    </style>
</head>
<body>
    <div class="main">
        <div class="tier-box">
            <div class="tier-title">Xin chào, <?php echo htmlspecialchars($username); ?>!</div>
            <div class="tier-level">Hạng thành viên hiện tại: <b><?php echo $rank; ?></b></div>
            <div class="tier-point">Tổng chi tiêu: <b><?php echo number_format($total_spent); ?> VND</b></div>
            <table class="tier-table">
                <tr>
                    <th>Hạng</th>
                    <th>Khoảng chi tiêu</th>
                </tr>
                <?php foreach ($tiers as $tier):
                    $isActive = ($rank === $tier['name']);
                ?>
                <tr<?php if ($isActive) echo ' class="active"'; ?> style="color:<?php echo $isActive ? $tier['color'] : '#555'; ?>;">
                    <td><i class="fa-solid <?php echo $tier['icon']; ?> tier-icon"></i><?php echo $tier['name']; ?></td>
                    <td>
                        <?php
                        if ($tier['max'] === PHP_INT_MAX) {
                            echo number_format($tier['min']) . ' VND trở lên';
                        } else {
                            echo number_format($tier['min']) . ' - ' . number_format($tier['max']) . ' VND';
                        }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>
