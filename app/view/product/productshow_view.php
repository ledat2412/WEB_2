<?php if (!isset($products)) die('Không được truy cập trực tiếp!'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/WEB_2/app/view/product/product.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/product.css">
</head>
<body>
    <!-- Main content -->
    <div class="main-container">
<!-- sorting bar -->
<div class="sorting-bar">
            <div class="sorting-options">
                <label for="sorting">Default sorting</label>
                <select id="sorting">
                    <option value="default">Default sorting</option>
                    <option value="price-low-high">Price: Low to High</option>
                    <option value="price-high-low">Price: High to Low</option>
                    <option value="popularity">Popularity</option>
                    <option value="rating">Rating</option>
                </select>
            </div>
            <div class="view-options">
                <button class="view-btn list-view active">
                    <span class="icon">☰</span> 
                </button>
                <button class="view-btn grid-view">
                    <span class="icon">▦</span> 
                </button>
                <button class="view-btn compact-view">
                    <span class="icon" style="color: orange;">▤</span> 
                </button>
            </div>
            <div class="results-info">Showing all 5 results</div>
        </div>
        <!-- sản phẩm và filter -->
        <div class="container">
            <!-- Filter Section on the Left -->
            <aside class="filter-section">
                <div class="filter-header">Bộ lọc tìm kiếm</div>
                <h3>Theo Danh Mục</h3>
                <div class="filter-options">
                    <div class="filter-option">Giày Chạy Bộ</div>
                    <div class="filter-option">Giày Bóng Rổ </div>
                    <div class="filter-option">Giày Thời Trang</div>
                    <div class="filter-option">Thời Cầu Lông </div>
                </div>
                <h3>Màu Sắc</h3>
                <div class="filter-options">
                    <div class="filter-option">TP. Hồ Chí Minh</div>
                    <div class="filter-option">Hà Nội</div>
                    <div class="filter-option">Đà Nẵng</div>
                    <div class="filter-option">Quận 1</div>
                    <div class="filter-option">Quận 3</div>
                </div>
                <h3>Gender</h3>
                <div class="filter-options">
                    <div class="filter-option">Hỏa Tốc</div>
                    <div class="filter-option">Nhanh</div>
                    <div class="filter-option">Tiết Kiệm</div>
                </div>
                <h3>Khoảng giá</h3>
                <div class="filter-options">
                    <div class="filter-option">Dưới 1 triệu</div>
                    <div class="filter-option">Trên 1 triệu</div>
                </div>
                <!-- <h3>Màu giày</h3>
                <div class="color-group">
                    <span class="color black"></span>
                    <span class="color red"></span>
                    <span class="color blue"></span>
                    <span class="color green"></span>
                    <span class="color yellow"></span>
                </div> -->
                <div class="button-container">
                    <button class="button reset-button">Thiết lập lại</button>
                    <button class="button apply-button">Áp dụng</button>
                </div>     
            </aside>

    <!-- <div class="debug-info">
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
    </div> -->

    <form method="GET" style="margin: 20px;">
    <label>Loại giày:
            <select name="variant">
                <option value="">Tất cả</option>
                <?php foreach ($variants as $v): ?>
                    <option value="<?= $v['id_product_variant'] ?>" <?= $filter_variant == $v['id_product_variant'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($v['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Màu sắc:
            <select name="color">
                <option value="">Tất cả</option>
                <?php foreach ($colors as $c): ?>
                    <option value="<?= $c['id_color'] ?>" <?= $filter_color == $c['id_color'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Giới tính:
            <select name="gender">
                <option value="">Tất cả</option>
                <?php foreach ($sexes as $s): ?>
                    <option value="<?= $s['id_sex'] ?>" <?= $filter_sex == $s['id_sex'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($s['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Giá:
            <select name="price">
                <option value="">Tất cả</option>
                <option value="1" <?= $filter_price == '1' ? 'selected' : '' ?>>Dưới 1 triệu</option>
                <option value="2" <?= $filter_price == '2' ? 'selected' : '' ?>>1 - 2 triệu</option>
                <option value="3" <?= $filter_price == '3' ? 'selected' : '' ?>>Trên 2 triệu</option>
            </select>
        </label>
        <button type="submit">Lọc</button>
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
                    <a href='/WEB_2/app/controller/main.php?act=products&action=product_detail&id=<?= $item['id_product'] ?>' style='text-decoration: none; color: inherit;'>
                    <!-- <a href='/WEB_2/app/controller/main.php?act=product_detail&id=<?= $item['id_product'] ?>' style='text-decoration: none; color: inherit;'> -->
                    <!-- <a href='product_detail.php?id=<?= $item['id_product'] ?>' style='text-decoration: none; color: inherit;'> -->
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
    </div>
</body>
</html>
