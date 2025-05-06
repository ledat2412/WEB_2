<?php if (!isset($products)) die('Không được truy cập trực tiếp!'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/WEB_2/app/view/product/product.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/product.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
            <div class="results-info">
                Tổng sản phẩm khác nhau: <?= count($unique_shoe_codes) ?><br>
                Sản phẩm khác nhau sau khi lọc: <?= isset($filtered_unique_shoe_codes) ? count($filtered_unique_shoe_codes) : count($unique_shoe_codes) ?>
            </div>
        </div>
        <!-- sản phẩm và filter -->
        <div class="container">
            <!-- Filter Section on the Left -->
            <aside class="filter-section">
                <div class="filter-header">Bộ lọc tìm kiếm</div>
                <form method="GET" class="filter-form">
                    <!-- Theo Danh Mục -->
                    <div class="filter-group">
                        <div>Theo Danh Mục</div>
                        <div class="filter-options">
                            <?php foreach ($variants as $v): ?>
                                <label class="filter-btns">
                                    <input type="radio" name="variant" value="<?= $v['id_product_variant'] ?>" <?= $filter_variant == $v['id_product_variant'] ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                    <span class="filter-label-text"><?= htmlspecialchars($v['name']) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Màu sắc -->
                    <div class="filter-group">
                        <div>Màu sắc</div>
                        <div class="filter-options">
                            <?php foreach ($colors as $c): ?>
                                <label class="filter-btns">
                                    <input type="radio" name="color" value="<?= $c['id_color'] ?>" <?= $filter_color == $c['id_color'] ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                    <span class="filter-label-text"><?= htmlspecialchars($c['name']) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Giới tính -->
                    <div class="filter-group">
                        <div>Giới tính</div>
                        <div class="filter-options">
                            <?php foreach ($sexes as $s): ?>
                                <label class="filter-btns">
                                    <input type="radio" name="sex" value="<?= $s['id_sex'] ?>" <?= $filter_sex == $s['id_sex'] ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                    <span class="filter-label-text"><?= htmlspecialchars($s['name']) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Khoảng giá -->
                    <div class="filter-group">
                        <div>Khoảng giá</div>
                        <div class="filter-options">
                            <label class="filter-btns">
                                <input type="radio" name="price" value="1" <?= $filter_price == '1' ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                <span class="filter-label-text">Dưới 1 triệu</span>
                            </label>
                            <label class="filter-btns">
                                <input type="radio" name="price" value="2" <?= $filter_price == '2' ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                <span class="filter-label-text">Trên 1 triệu</span>
                            </label>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="button" class="button reset-button" onclick="resetFilter()">Thiết lập lại</button>
                        <button type="submit" class="button apply-button">Áp dụng</button>
                    </div>
                </form>
            </aside>
            <script>
                function resetFilter() {
                    const form = document.querySelector('.filter-form');
                    // Reset all radio buttons
                    form.querySelectorAll('input[type="radio"]').forEach(input => input.checked = false);
                    // Reset all select (if any)
                    form.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
                    // Submit form to reset filter on server side
                    form.submit();
                }

                // Improved: Allow unselect radio on click, always accurate even after reload
                function toggleRadio(radio) {
                    // If already checked, uncheck and submit immediately
                    if (radio.checked && radio.dataset.waschecked === "true") {
                        radio.checked = false;
                        radio.dataset.waschecked = "false";
                    } else {
                        // Uncheck all radios in group
                        document.querySelectorAll('input[name="' + radio.name + '"]').forEach(function(el) {
                            el.dataset.waschecked = "false";
                        });
                        radio.dataset.waschecked = "true";
                    }
                }
                // On page load, set waschecked for checked radios
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll('.filter-form input[type="radio"]').forEach(function(radio) {
                        radio.dataset.waschecked = radio.checked ? "true" : "false";
                    });
                });
            </script>

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