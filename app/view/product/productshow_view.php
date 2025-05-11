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
            <?php if (empty($_GET) || isset($_GET['showall'])): ?>
                <!-- Không hiển thị filter nếu không có filter hoặc có ?showall=1 -->
            <?php else: ?>
            <aside class="filter-section">
                <div class="filter-header">Bộ lọc tìm kiếm</div>
                <form method="GET" class="filter-form">
                    <!-- Theo Danh Mục -->
                    <div class="filter-group">
                        <div>Theo Danh Mục</div>
                        <div class="filter-options">
                            <!-- Nút "Tất cả sản phẩm" -->
                            <label class="filter-btns">
                                <input type="radio" name="variant" value="" <?= empty($filter_variant) ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                <span class="filter-label-text">Tất cả sản phẩm</span>
                            </label>
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
                    <!-- Material -->
                    <div class="filter-group">
                        <div>Chất liệu</div>
                        <div class="filter-options">
                            <?php foreach ($materials as $m): ?>
                                <label class="filter-btns">
                                    <input type="radio" name="material" value="<?= $m['id_material'] ?>" <?= $filter_material == $m['id_material'] ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                    <span class="filter-label-text"><?= htmlspecialchars($m['name']) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Khoảng giá -->
                    <div class="filter-group">
                        <div>Khoảng giá</div>
                        <div class="filter-options">
                            <div class="price-range-row" style="flex-direction:column;align-items:flex-start;gap:8px;">
                                <div>
                                    <label class="price-range-label" for="price_min">Từ</label>
                                    <span class="price-range-wrapper">
                                        <input type="text" min="0" name="price_min" id="price_min"
                                            class="price-range-input"
                                            value="<?= isset($_GET['price_min']) ? htmlspecialchars($_GET['price_min']) : '' ?>"
                                            placeholder="0">
                                        <span class="price-range-suffix">vn₫</span>
                                    </span>
                                </div>
                                <div style="margin-top:4px;">
                                    <label class="price-range-label" for="price_max">Đến</label>
                                    <span class="price-range-wrapper">
                                        <input type="text" min="0" name="price_max" id="price_max"
                                            class="price-range-input"
                                            value="<?= isset($_GET['price_max']) ? htmlspecialchars($_GET['price_max']) : '' ?>"
                                            placeholder="999.999.999">
                                        <span class="price-range-suffix">vn₫</span>
                                    </span>
                                </div>
                                <div id="price-range-error" style="color:#ec2a2a;font-size:14px;display:none;margin-top:4px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Thêm filter sản phẩm bán chạy/phổ thông -->
                    <div class="filter-group">
                        <div>Loại sản phẩm</div>
                        <div class="filter-options">
                            <label class="filter-btns">
                                <input type="radio" name="product_type" value="banchay" <?= (isset($_GET['product_type']) && $_GET['product_type'] == 'banchay') ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                <span class="filter-label-text">Sản phẩm bán chạy</span>
                            </label>
                            <label class="filter-btns">
                                <input type="radio" name="product_type" value="phothong" <?= (isset($_GET['product_type']) && $_GET['product_type'] == 'phothong') ? 'checked' : '' ?> onclick="toggleRadio(this)">
                                <span class="filter-label-text">Sản phẩm phổ thông</span>
                            </label>
                        </div>
                    </div>
                    <?php if (isset($_GET['act'])): ?>
                        <input type="hidden" name="act" value="<?= htmlspecialchars($_GET['act']) ?>">
                    <?php else: ?>
                        <input type="hidden" name="act" value="products">
                    <?php endif; ?>
                    <?php if (isset($_GET['product_type']) && $_GET['product_type'] !== ''): ?>
                        <input type="hidden" name="product_type" value="<?= htmlspecialchars($_GET['product_type']) ?>">
                    <?php endif; ?>
                    <div class="button-container">
                        <button type="button" class="button reset-button" onclick="resetFilter()">Thiết lập lại</button>
                        <button type="submit" class="button apply-button">Áp dụng</button>
                    </div>
                </form>
            </aside>
            <?php endif; ?>
            <script>
                function resetFilter() {
                    const form = document.querySelector('.filter-form');
                    // Reset all radio buttons
                    form.querySelectorAll('input[type="radio"]').forEach(input => input.checked = false);
                    // Reset all select (if any)
                    form.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
                    // Reset price range inputs
                    form.querySelectorAll('.price-range-input').forEach(input => input.value = '');
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

                function formatVNDInput(input) {
                    let value = input.value.replace(/\D/g, '');
                    if (value) {
                        value = value.replace(/^0+/, '');
                        value = value ? value.replace(/\B(?=(\d{3})+(?!\d))/g, ".") : '';
                    }
                    input.value = value;
                }

                function getIntValue(str) {
                    return parseInt(str.replace(/\./g, ''), 10) || 0;
                }

                function validatePriceRange() {
                    const minInput = document.getElementById('price_min');
                    const maxInput = document.getElementById('price_max');
                    const errorDiv = document.getElementById('price-range-error');
                    const minVal = getIntValue(minInput.value);
                    const maxVal = getIntValue(maxInput.value);
                    if (minInput.value && maxInput.value && maxVal < minVal) {
                        errorDiv.style.display = 'block';
                        errorDiv.textContent = 'Khoảng giá không hợp lệ, đã được đặt lại.';
                        // Reset luôn cả hai input về rỗng
                        minInput.value = '';
                        maxInput.value = '';
                        setTimeout(() => { errorDiv.style.display = 'none'; }, 2000);
                        return false;
                    }
                    errorDiv.style.display = 'none';
                    return true;
                }

                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.price-range-input').forEach(function(input) {
                        input.addEventListener('input', function() {
                            formatVNDInput(this);
                            // Không gọi validatePriceRange ở đây nữa
                        });
                        if (input.value) formatVNDInput(input);
                    });
                    // Chỉ validate khi submit filter
                    document.querySelector('.filter-form').addEventListener('submit', function(e) {
                        if (!validatePriceRange()) {
                            e.preventDefault();
                        }
                    });
                });

            </script>

            <div class="product-container">
                <?php
                // Lọc sản phẩm theo loại nếu có filter
                $show_type = isset($_GET['product_type']) ? $_GET['product_type'] : '';
                $filtered = $filtered_products ?? [];

                // Đếm số lượng order cho từng sản phẩm
                // Giả sử $orders là mảng các đơn hàng, mỗi đơn có ['id_product'] hoặc ['product_id']
                // và $filtered_products là danh sách sản phẩm đã lọc theo các filter khác
                $order_count = [];
                if (isset($orders) && is_array($orders)) {
                    foreach ($orders as $order) {
                        $pid = isset($order['id_product']) ? $order['id_product'] : (isset($order['product_id']) ? $order['product_id'] : null);
                        if ($pid !== null) {
                            if (!isset($order_count[$pid])) $order_count[$pid] = 0;
                            $order_count[$pid]++;
                        }
                    }
                }

                // Phân loại sản phẩm bán chạy (top 20%) và phổ thông (còn lại)
                if ($show_type === 'banchay' || $show_type === 'phothong') {
                    // Sắp xếp sản phẩm theo số lượng order giảm dần
                    $products_with_order = [];
                    foreach ($filtered as $item) {
                        $pid = $item['id_product'];
                        $products_with_order[] = [
                            'item' => $item,
                            'order_count' => isset($order_count[$pid]) ? $order_count[$pid] : 0
                        ];
                    }
                    usort($products_with_order, function ($a, $b) {
                        return $b['order_count'] <=> $a['order_count'];
                    });

                    // Chia top 20% là bán chạy, còn lại là phổ thông
                    $total = count($products_with_order);
                    $top_count = max(1, ceil($total * 0.2));
                    $banchay = array_slice($products_with_order, 0, $top_count);
                    $phothong = array_slice($products_with_order, $top_count);

                    if ($show_type === 'banchay') {
                        $filtered = array_map(function ($x) {
                            return $x['item'];
                        }, $banchay);
                    } else {
                        $filtered = array_map(function ($x) {
                            return $x['item'];
                        }, $phothong);
                    }
                }

                // Pagination logic (chỉ hiển thị 3 sản phẩm mỗi trang)
                $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                $per_page = 12;
                $total_products = count($filtered);
                $total_pages = ceil($total_products / $per_page);
                $current_page = $page;
                $start = ($page - 1) * $per_page;
                $paged_products = array_slice($filtered, $start, $per_page);

                ?>
                <?php if (!empty($paged_products)): ?>
                    <?php foreach ($paged_products as $item): ?>
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
        <!-- Pagination đặt ngoài .container để luôn nằm dưới sản phẩm -->
        <?php if ($total_pages > 1): ?>
            <div class="pagination" style="display:flex;justify-content:center;gap:8px;margin:30px 0;flex-wrap:wrap;">
                <?php
                    $query = $_GET;
                    unset($query['page']);
                    $query_string = http_build_query($query);

                    // Helper for link
                    function page_link($i, $query_string) {
                        return '?' . $query_string . ($query_string ? '&' : '') . 'page=' . $i;
                    }

                    // Arrow prev
                    if ($current_page > 1) {
                        echo '<a href="' . page_link($current_page - 1, $query_string) . '" style="padding:6px 14px;">&laquo;</a>';
                    } else {
                        echo '<span style="padding:6px 14px;color:#bbb;">&laquo;</span>';
                    }

                    // Pagination logic with ellipsis if > 10 pages
                    if ($total_pages <= 10) {
                        for ($i = 1; $i <= $total_pages; $i++) {
                            $active = ($i == $current_page) ? 'style="background:#ec2a2a;color:#fff;border-radius:4px;"' : '';
                            echo '<a href="' . page_link($i, $query_string) . "\" $active>$i</a>";
                        }
                    } else {
                        // Always show first, last, current, current-1, current+1, and ellipsis
                        if ($current_page > 3) {
                            echo '<a href="' . page_link(1, $query_string) . '">1</a>';
                            if ($current_page > 4) echo '<span style="padding:6px 10px;">...</span>';
                        }
                        for ($i = max(1, $current_page - 1); $i <= min($total_pages, $current_page + 1); $i++) {
                            $active = ($i == $current_page) ? 'style="background:#ec2a2a;color:#fff;border-radius:4px;"' : '';
                            echo '<a href="' . page_link($i, $query_string) . "\" $active>$i</a>";
                        }
                        if ($current_page < $total_pages - 2) {
                            if ($current_page < $total_pages - 3) echo '<span style="padding:6px 10px;">...</span>';
                            echo '<a href="' . page_link($total_pages, $query_string) . "\">$total_pages</a>";
                        }
                    }

                    // Arrow next
                    if ($current_page < $total_pages) {
                        echo '<a href="' . page_link($current_page + 1, $query_string) . '" style="padding:6px 14px;">&raquo;</a>';
                    } else {
                        echo '<span style="padding:6px 14px;color:#bbb;">&raquo;</span>';
                    }
                ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>