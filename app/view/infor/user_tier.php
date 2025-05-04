<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/user_tier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <div class="main-content-infor">

        <h2>Hạng thành viên hiện tại:</h2>
        <?php if ($rank === 'Chưa là thành viên'): ?>
            <b style="color:<?php echo $rankColor; ?>"><?php echo $rank; ?></b>
        <?php else: ?>
            <b class="rank-glow-shine" style="
            background: linear-gradient(120deg, <?php echo $rankColor; ?>, <?php echo $rankColor; ?>, #fff 100%);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: shine 2s linear infinite;
        "><?php echo $rank; ?></b>
        <?php endif; ?>

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