<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/product_detail.css">
</head>

<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!empty($_SESSION['cart_message'])) {
        echo '<div class="cart-message" id="cartMessage">' . htmlspecialchars($_SESSION['cart_message']) . '</div>';
        unset($_SESSION['cart_message']);
    }
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var msg = document.getElementById('cartMessage');
        if (msg) {
            setTimeout(function() {
                msg.style.display = 'none';
            }, 2000);
        }
    });
    </script>
    <!-- Main content -->
    <div class="main-containers">
        <?php if ($product_detail): $item = $product_detail[0]; ?>
            <div class="product-detail-layout">
                <div class="product-left">
                    <div class="product-images">
                        <?php if (!empty($image_urls)): ?>
                            <img src="<?php echo $image_urls[0]; ?>" alt="<?php echo $item['product_name']; ?>" class="main-image" id="mainImage" onclick="openModal(this.src)">
                            <div class="thumbnail-container">
                                <?php foreach ($image_urls as $index => $url): ?>
                                    <img src="<?php echo $url; ?>"
                                        alt="<?php echo $item['product_name'] . ' view ' . ($index + 1); ?>"
                                        class="thumbnail <?php echo $index === 0 ? 'active' : ''; ?>"
                                        onclick="changeMainImage(this.src, this)">
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="product-right">
                    <div class="product-info">
                        <h1 class="product-name"><?php echo $item['product_name']; ?></h1>
                        <div class="product-code">Mã sản phẩm: <?php echo $item['shoe_code']; ?></div>
                        <div class="product-price" id="main-product-price"><?php echo number_format($first_price, 0, ',', '.'); ?> ₫</div>
                        <div class="product-meta">
                            <div class="meta-item"><span class="meta-label">Màu sắc:</span><span><?php echo $item['color_name']; ?></span></div>
                            <div class="meta-item"><span class="meta-label">Chất liệu:</span><span><?php echo $item['material_name']; ?></span></div>
                            <div class="meta-item"><span class="meta-label">Giới tính:</span><span><?php echo $item['sex_name']; ?></span></div>
                            <div class="meta-item"><span class="meta-label">Loại:</span><span><?php echo $item['variant_name']; ?></span></div>
                        </div>
                        <div class="size-selector">
                            <?php
                            // Lấy danh sách size và giá từng size từ bảng product (mỗi size là một dòng)
                            // $item là dòng đầu tiên, lấy các dòng cùng shoe_code và color_id
                            $sizes = [];
                            $size_prices = [];
                            $size_product_ids = [];
                            if (!empty($item['shoe_code']) && !empty($item['color_id'])) {
                                // Kết nối lại DB để lấy các dòng cùng shoe_code và color_id
                                $conn = new mysqli("localhost", "root", "", "lining_1");
                                $code = $conn->real_escape_string($item['shoe_code']);
                                $color_id = (int)$item['color_id'];
                                $sql = "SELECT id_product, size, price FROM product WHERE shoe_code='$code' AND color_id=$color_id ORDER BY size+0 ASC";
                                $result = $conn->query($sql);
                                if ($result) {
                                    while ($row = $result->fetch_assoc()) {
                                        $sizes[] = $row['size'];
                                        $size_prices[$row['size']] = $row['price'];
                                        $size_product_ids[$row['size']] = $row['id_product'];
                                    }
                                }
                                $conn->close();
                            }
                            // Nếu không lấy được thì fallback về dữ liệu cũ
                            if (empty($sizes)) {
                                $sizes = array_map('trim', explode(',', $item['available_sizes']));
                                foreach ($sizes as $sz) {
                                    $size_prices[$sz] = $item['price'];
                                    $size_product_ids[$sz] = $item['id_product'];
                                }
                            }
                            $first_size = $sizes[0] ?? '';
                            $first_price = isset($size_prices[$first_size]) ? $size_prices[$first_size] : $item['price'];
                            $first_product_id = isset($size_product_ids[$first_size]) ? $size_product_ids[$first_size] : $item['id_product'];
                            ?>
                            <form id="add-to-cart-form" method="post" action="/WEB_2/app/controller/main.php?act=cart&action=add">
                                <div class="size-qty-container">
                                    <div>
                                        <div class="size-selector-label">Chọn size:</div>
                                        <div class="size-options">
                                            <?php foreach ($sizes as $i => $size): 
                                                $price = isset($size_prices[$size]) ? $size_prices[$size] : $item['price'];
                                                $pid = isset($size_product_ids[$size]) ? $size_product_ids[$size] : $item['id_product'];
                                            ?>
                                                <label class="size-radio-label">
                                                    <input type="radio" name="size" value="<?php echo $size; ?>" data-price="<?php echo $price; ?>" data-product-id="<?php echo $pid; ?>" <?php if($i === 0) echo 'checked'; ?>>
                                                    <span><?php echo $size; ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="qty-row">
                                        <span class="qty-label">Số lượng:</span>
                                        <input type="number" name="quantity" id="product-quantity" value="1" min="1">
                                    </div>
                                    <input type="hidden" name="product_id" id="hidden-product-id" value="<?php echo $first_product_id; ?>">
                                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($item['product_name']); ?>">
                                    <input type="hidden" name="product_img" value="<?php echo isset($image_urls[0]) ? $image_urls[0] : ''; ?>">
                                    <input type="hidden" name="product_price" id="hidden-product-price" value="<?php echo $first_price; ?>">
                                    <button type="submit" class="add-to-cart"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-description product-description-center">
                <h3>Mô tả sản phẩm</h3>
                <div><?php echo nl2br($item['description']); ?></div>
            </div>
            <!-- Modal -->
            <div id="imageModal" class="modal" data-images='<?php echo json_encode($image_urls); ?>'>
                <span class="close" onclick="closeModal()">&times;</span>
                <button id="prevBtn" class="modal-nav" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);font-size:40px;background:none;border:none;color:white;cursor:pointer;z-index:1001;">&#10094;</button>
                <img class="modal-content" id="modalImage">
                <button id="nextBtn" class="modal-nav" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);font-size:40px;background:none;border:none;color:white;cursor:pointer;z-index:1001;">&#10095;</button>
            </div>
            <script src="/WEB_2/app/view/product/product_detail.js"></script>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const radios = document.querySelectorAll('input[name="size"]');
                const mainPrice = document.getElementById('main-product-price');
                const hiddenPrice = document.getElementById('hidden-product-price');
                const quantityInput = document.getElementById('product-quantity');
                const hiddenProductId = document.getElementById('hidden-product-id');
                const defaultPrice = Number(radios[0]?.getAttribute('data-price')) || 0;
                let lastCheckedRadio = null;

                function updateDisplayPrice() {
                    let price = defaultPrice;
                    let checkedRadio = Array.from(radios).find(r => r.checked);
                    if (checkedRadio) {
                        price = Number(checkedRadio.getAttribute('data-price'));
                        // Cập nhật id sản phẩm theo size
                        hiddenProductId.value = checkedRadio.getAttribute('data-product-id');
                    }
                    let qty = parseInt(quantityInput.value) || 1;
                    if (qty < 1) qty = 1;
                    mainPrice.textContent = (price * qty).toLocaleString('vi-VN') + ' ₫';
                    hiddenPrice.value = price;
                }

                // Hiển thị giá mặc định ban đầu
                updateDisplayPrice();

                radios.forEach(radio => {
                    radio.addEventListener('mousedown', function(e) {
                        if (this.checked) {
                            lastCheckedRadio = this;
                        } else {
                            lastCheckedRadio = null;
                        }
                    });
                    radio.addEventListener('click', function(e) {
                        if (lastCheckedRadio === this) {
                            setTimeout(() => { this.checked = false; updateDisplayPrice(); }, 1);
                            lastCheckedRadio = null;
                            e.preventDefault();
                        } else {
                            updateDisplayPrice();
                        }
                    });
                    radio.addEventListener('change', function() {
                        updateDisplayPrice();
                    });
                });

                quantityInput.addEventListener('input', function() {
                    if (this.value < 1) this.value = 1;
                    updateDisplayPrice();
                });

                document.getElementById('add-to-cart-form').addEventListener('click', function() {
                    const checked = Array.from(radios).some(r => r.checked);
                    if (!checked) {
                        updateDisplayPrice();
                    }
                });

                // Enable drag-to-scroll for thumbnail-container (for mouse/touch)
                const thumbContainer = document.querySelector('.thumbnail-container');
                if (thumbContainer) {
                    let isDown = false;
                    let startX;
                    let scrollLeft;
                    thumbContainer.addEventListener('mousedown', function(e) {
                        isDown = true;
                        thumbContainer.classList.add('active');
                        startX = e.pageX - thumbContainer.offsetLeft;
                        scrollLeft = thumbContainer.scrollLeft;
                    });
                    thumbContainer.addEventListener('mouseleave', function() {
                        isDown = false;
                        thumbContainer.classList.remove('active');
                    });
                    thumbContainer.addEventListener('mouseup', function() {
                        isDown = false;
                        thumbContainer.classList.remove('active');
                    });
                    thumbContainer.addEventListener('mousemove', function(e) {
                        if (!isDown) return;
                        e.preventDefault();
                        const x = e.pageX - thumbContainer.offsetLeft;
                        const walk = (x - startX) * 1.5; // scroll speed
                        thumbContainer.scrollLeft = scrollLeft - walk;
                    });
                    // Optional: support for wheel event (shift+wheel for horizontal scroll)
                    thumbContainer.addEventListener('wheel', function(e) {
                        if (e.deltaY !== 0) {
                            thumbContainer.scrollLeft += e.deltaY;
                            e.preventDefault();
                        }
                    }, { passive: false });
                }
            });
            </script>
        <?php else: ?>
            <div style='text-align: center; padding: 50px;'>Không tìm thấy sản phẩm</div>
        <?php endif; ?>
    </div>
</body>

</html>