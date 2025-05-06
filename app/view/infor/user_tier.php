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
        <?php if ($rank === 'Not a member'): ?>
            <b style="color:<?php echo $rankColor; ?>;font-size: 2.5rem;font-weight: bold;position: relative;display: inline-block;overflow: hidden;"><?php echo $rank; ?></b>
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

        <div style="text-align: center;">
            <span id="see-more" style="color:#555; cursor:pointer; font-weight:bold;">See more</span>
            <!-- Progress bar dưới See more -->
            <div id="progress-bar-wrapper" style="margin: 30px auto 0 auto; max-width: 350px;">
                <?php
                    // Tìm tier tiếp theo
                    $nextTier = null;
                    foreach ($tiers as $tier) {
                        if ($tier['min'] > $total_spent) {
                            $nextTier = $tier;
                            break;
                        }
                    }
                    $percent = 0;
                    if ($nextTier) {
                        $range = $nextTier['min'] - ($tiers[0]['min'] ?? 0);
                        $percent = min(100, round($total_spent / $nextTier['min'] * 100));
                    } else {
                        $percent = 100;
                    }
                ?>
                <div style="margin-bottom:8px; color:#888; font-size:14px;">
                    <?php if ($nextTier): ?>
                        Còn <b><?php echo number_format($nextTier['min'] - $total_spent); ?> VND</b> để lên hạng <b style="color:<?php echo $nextTier['color']; ?>"><?php echo $nextTier['name']; ?></b>
                    <?php else: ?>
                        Bạn đã đạt hạng cao nhất!
                    <?php endif; ?>
                </div>
                <div style="background:#eee; border-radius:8px; height:16px; width:100%; overflow:hidden;">
                    <div style="background:linear-gradient(90deg,#ff8c00,#ffd700); height:100%; width:<?php echo $percent; ?>%; border-radius:8px;"></div>
                </div>
            </div>
            <!-- Mô tả quyền lợi -->
            <div id="benefit-desc" style="margin: 32px auto 0 auto; max-width: 400px; color: #666; font-size: 15px;">
                <i class="fa-solid fa-gift" style="color:#ff9800;"></i>
                <span>
                    Thành viên càng cao, ưu đãi càng lớn: tích điểm, giảm giá, quà sinh nhật và nhiều quyền lợi khác!
                </span>
            </div>
            <div id="dropdown-content" class="dropdown-hidden">
                <span id="close-dropdown" style="float:right; cursor:pointer; font-size:18px; color:#888;">&times;</span>
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
        <script src="/WEB_2/public/assets/js/user_tier.js"></script>
        <script>
            // Ẩn progress bar và mô tả quyền lợi khi click See more, hiện lại khi đóng dropdown
            document.addEventListener('DOMContentLoaded', function() {
                var seeMore = document.getElementById('see-more');
                var progressBar = document.getElementById('progress-bar-wrapper');
                var benefitDesc = document.getElementById('benefit-desc');
                var dropdown = document.getElementById('dropdown-content');
                var closeBtn = document.getElementById('close-dropdown');
                if (seeMore && progressBar && benefitDesc && dropdown && closeBtn) {
                    seeMore.onclick = function() {
                        progressBar.style.display = 'none';
                        benefitDesc.style.display = 'none';
                        seeMore.style.display = 'none';
                        dropdown.classList.remove('dropdown-hidden');
                        dropdown.classList.add('dropdown-show');
                    };
                    closeBtn.onclick = function() {
                        dropdown.classList.remove('dropdown-show');
                        dropdown.classList.add('dropdown-hidden');
                        setTimeout(() => {
                            progressBar.style.display = '';
                            benefitDesc.style.display = '';
                            seeMore.style.display = 'inline-block';
                        }, 400);
                    };
                }
            });
        </script>
    </div>
</body>

</html>