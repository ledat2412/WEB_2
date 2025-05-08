<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị sản phẩm</title>
    <link rel="stylesheet" href="/WEB_2/app/view/product/product.css"> 
</head>
<body>
    <!-- Debug Information -->
    <div class="debug-info">
        <?php
        require_once '../../model/product.php';
        require_once '../../model/product_variant.php';
        require_once '../../model/colors.php';
        require_once '../../model/sex.php';
        
        $product = new Product();
        $products = $product->getAllProducts();
        
        $variantModel = new ProductVariant();
        $variants = $variantModel->getAllVariants();

        $colorModel = new Colors();
        $colors = $colorModel->getAllColors();

        $sexModel = new Sex();
        $sexes = $sexModel->getAllSex();

        // Xử lý filter từ form
        $filter_variant = $_GET['variant'] ?? '';
        $filter_color = $_GET['color'] ?? '';
        $filter_price = $_GET['price'] ?? '';
        $filter_sex = $_GET['sex'] ?? '';
        
        echo "<h3>Debug Information:</h3>";
        echo "Số lượng sản phẩm: " . count($products) . "<br>";
        // Đếm số sản phẩm không trùng nhau theo shoe_code
        $unique_shoe_codes = array();
        foreach ($products as $item) {
            if (!in_array($item['shoe_code'], $unique_shoe_codes)) {
                $unique_shoe_codes[] = $item['shoe_code'];
            }
        }
        echo "Số lượng sản phẩm không trùng nhau: " . count($unique_shoe_codes) . "<br>";
        echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
        
        if (empty($products)) {
            echo "Không có sản phẩm nào được tìm thấy.<br>";
        } else {
            echo "<h4>Thông tin sản phẩm đầu tiên:</h4>";
            echo "<pre>";
            print_r($products[0]);
            echo "</pre>";
        }
        ?>
    </div>

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
            <select name="sex">
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
        <?php
        // Mảng để lưu trữ các sản phẩm đã hiển thị (dựa trên shoe_code)
        $displayed_products = array();
        
        if (!empty($products)) {
            foreach ($products as $item) {
                // Lọc theo loại giày
                if ($filter_variant && $item['id_product_variant'] != $filter_variant) continue;
                // Lọc theo màu sắc
                if ($filter_color && $item['color_id'] != $filter_color) continue;
                // Lọc theo giới tính
                if ($filter_sex && $item['sex_id'] != $filter_sex) continue;
                // Lọc theo giá
                if ($filter_price) {
                    if ($filter_price == '1' && $item['price'] >= 1000000) continue;
                    if ($filter_price == '2' && ($item['price'] < 1000000 || $item['price'] > 2000000)) continue;
                    if ($filter_price == '3' && $item['price'] <= 2000000) continue;
                }
                // Kiểm tra nếu sản phẩm chưa được hiển thị
                if (!in_array($item['shoe_code'], $displayed_products)) {
                    // Thêm shoe_code vào mảng đã hiển thị
                    $displayed_products[] = $item['shoe_code'];
                    
                    // Debug đường dẫn ảnh
                    echo "<!-- Debug: Checking image path for product " . $item['product_name'] . " -->\n";
                    
                    // Lấy đường dẫn ảnh
                    $image_dir = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/" . str_replace("../../../public/assets/img/Sản Phẩm/", "", $item['picture_path']);
                    $absolute_dir = realpath($image_dir);
                    
                    echo "<!-- Debug: Image directory: " . $image_dir . " -->\n";
                    echo "<!-- Debug: Absolute directory: " . $absolute_dir . " -->\n";
                    
                    if ($absolute_dir) {
                        // Tìm tất cả các ảnh của sản phẩm
                        $webp_images = glob($absolute_dir . "/*.webp") ?: [];
                        $jpg_images = glob($absolute_dir . "/*.jpg") ?: [];
                        $jpeg_images = glob($absolute_dir . "/*.jpeg") ?: [];
                        $png_images = glob($absolute_dir . "/*.png") ?: [];
                        $images = array_merge($webp_images, $jpg_images, $jpeg_images, $png_images);
                        
                        echo "<!-- Debug: Found " . count($images) . " images -->\n";
                        
                        // Lấy ảnh đầu tiên nếu có
                        $main_image = !empty($images) ? $images[0] : '';
                        if ($main_image) {
                            $url_path = str_replace('\\', '/', $main_image);
                            $url_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $url_path);
                            
                            echo "<div class='product-item'>";
                            echo "<a href='product_detail0.php?id=" . $item['id_product'] . "' style='text-decoration: none; color: inherit;'>";
                            // echo "<img src='" . $url_path . "' alt='" . $item['product_name'] . "' class='product-image' onclick='openModal(this.src)'>";
                            echo "<img src='" . $url_path . "' alt='" . $item['product_name'] . "' class='product-image'>";
                            echo "<div class='product-info'>";
                            echo "<div class='product-name'>" . $item['product_name'] . "</div>";
                            echo "<div class='product-code'>Mã: " . $item['shoe_code'] . "</div>";
                            echo "<div class='product-price'>" . number_format($item['price'], 0, ',', '.') . " ₫</div>";
                            echo "</div>";
                            echo "</a>";
                            echo "</div>";
                        } else {
                            echo "<!-- Debug: No images found in directory: " . $absolute_dir . " -->\n";
                            echo "<!-- Debug: Available files: -->\n";
                            $all_files = scandir($absolute_dir);
                            foreach ($all_files as $file) {
                                echo "<!-- File: " . $file . " -->\n";
                            }
                        }
                    } else {
                        echo "<!-- Debug: Directory not found: " . $image_dir . " -->\n";
                    }
                }
            }
        } else {
            echo "<p>Không có sản phẩm nào.</p>";
        }
        ?>
    </div>

    <!-- Modal -->
    <!-- <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>
        function openModal(imgSrc) {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("modalImage");
            modal.style.display = "block";
            modalImg.src = imgSrc;
        }

        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById("imageModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script> -->
</body>
</html>

