<?php if (!isset($products)) die('Không được truy cập trực tiếp!'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị sản phẩm</title>
    <link rel="stylesheet" href="/WEB_2/app/view/product/product.css">
</head>
<body>
    <div class="debug-info">
        <h3>Debug Information:</h3>
        Số lượng sản phẩm: <?= count($products) ?><br>
        Số lượng sản phẩm không trùng nhau: <?= count($unique_shoe_codes) ?><br>
        Document Root: <?= $_SERVER['DOCUMENT_ROOT'] ?><br>
        <?php if (empty($products)): ?>
            Không có sản phẩm nào được tìm thấy.<br>
        <?php else: ?>
            <h4>Thông tin sản phẩm đầu tiên:</h4>
            <pre><?php print_r($products[0]); ?></pre>
        <?php endif; ?>
    </div>

    <form method="GET" style="margin: 20px;">
        <!-- ... giữ nguyên phần filter ... -->
        <!-- Copy phần filter từ file cũ sang -->
    </form>

    <div class="product-container">
        <?php if (!empty($filtered_products)): ?>
            <?php foreach ($filtered_products as $item): ?>
                <?php
                $image_dir = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/" . str_replace("../../../public/assets/img/Sản Phẩm/", "", $item['picture_path']);
                $absolute_dir = realpath($image_dir);
                $main_image = '';
                if ($absolute_dir) {
                    $webp_images = glob($absolute_dir . '/*.webp') ?: [];
                    $jpg_images = glob($absolute_dir . '/*.jpg') ?: [];
                    $jpeg_images = glob($absolute_dir . '/*.jpeg') ?: [];
                    $png_images = glob($absolute_dir . '/*.png') ?: [];
                    $images = array_merge($webp_images, $jpg_images, $jpeg_images, $png_images);
                    $main_image = !empty($images) ? $images[0] : '';
                }
                $url_path = $main_image ? str_replace(['\\', $_SERVER['DOCUMENT_ROOT']], ['/', ''], $main_image) : '';
                ?>
                <div class='product-item'>
                    <a href='product_detail.php?id=<?= $item['id_product'] ?>' style='text-decoration: none; color: inherit;'>
                        <?php if ($url_path): ?>
                            <img src='<?= $url_path ?>' alt='<?= $item['product_name'] ?>' class='product-image'>
                        <?php endif; ?>
                        <div class='product-info'>
                            <div class='product-name'><?= $item['product_name'] ?></div>
                            <div class='product-code'>Mã: <?= $item['shoe_code'] ?></div>
                            <div class='product-price'><?= number_format($item['price'], 0, ',', '.') ?> ₫</div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
    </div>
</body>
</html>
