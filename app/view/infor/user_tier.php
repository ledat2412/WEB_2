<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/infor_sidebar.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/user_tier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="main-content-infor">
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
</body>
</html>
