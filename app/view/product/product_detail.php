<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="/WEB_2/public/assets/css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        .product-detail {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            display: flex;
            gap: 40px;
        }
        .product-images {
            flex: 1;
            max-width: 500px;
        }
        .main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .thumbnail-container {
            display: flex;
            gap: 10px;
            overflow-x: auto;
        }
        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .thumbnail.active {
            border-color: #e44d26;
        }
        .product-info {
            flex: 1;
        }
        .product-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        .product-code {
            color: #666;
            margin-bottom: 20px;
        }
        .product-price {
            font-size: 24px;
            color: #e44d26;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .product-description {
            margin: 20px 0;
            line-height: 1.6;
        }
        .product-meta {
            margin: 20px 0;
        }
        .meta-item {
            display: flex;
            margin-bottom: 10px;
        }
        .meta-label {
            width: 120px;
            color: #666;
        }
        .size-selector {
            display: flex;
            gap: 10px;
            margin: 20px 0;
        }
        .size-btn {
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            background: white;
        }
        .size-btn:hover, .size-btn.active {
            background: #e44d26;
            color: white;
            border-color: #e44d26;
        }
        .add-to-cart {
            background: #e44d26;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        .add-to-cart:hover {
            background: #c73e1d;
        }
    </style>
</head>
<body>
    <?php
    require_once '../../model/product.php';
    
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $product = new Product();
        $product_detail = $product->getProduct($product_id);
        
        if ($product_detail) {
            $item = $product_detail[0]; // Lấy thông tin sản phẩm
            
            // Lấy đường dẫn ảnh
            $image_dir = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/" . 
                        str_replace("../../../public/assets/img/Sản Phẩm/", "", $item['picture_path']);
            $absolute_dir = realpath($image_dir);
            
            // Tìm tất cả các ảnh của sản phẩm
            $images = [];
            if ($absolute_dir) {
                $webp_images = glob($absolute_dir . "/*.webp") ?: [];
                $jpg_images = glob($absolute_dir . "/*.jpg") ?: [];
                $jpeg_images = glob($absolute_dir . "/*.jpeg") ?: [];
                $png_images = glob($absolute_dir . "/*.png") ?: [];
                $images = array_merge($webp_images, $jpg_images, $jpeg_images, $png_images);
            }
            
            // Chuyển đổi đường dẫn ảnh
            $image_urls = [];
            foreach ($images as $image) {
                $url_path = str_replace('\\', '/', $image);
                $url_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $url_path);
                $image_urls[] = $url_path;
            }
    ?>
    <div class="product-detail">
        <div class="product-images">
            <?php if (!empty($image_urls)): ?>
                <img src="<?php echo $image_urls[0]; ?>" alt="<?php echo $item['product_name']; ?>" class="main-image" id="mainImage">
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
        
        <div class="product-info">
            <h1 class="product-name"><?php echo $item['product_name']; ?></h1>
            <div class="product-code">Mã sản phẩm: <?php echo $item['shoe_code']; ?></div>
            <div class="product-price"><?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</div>
            
            <div class="product-meta">
                <div class="meta-item">
                    <span class="meta-label">Màu sắc:</span>
                    <span><?php echo $item['color_name']; ?></span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Chất liệu:</span>
                    <span><?php echo $item['material_name']; ?></span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Giới tính:</span>
                    <span><?php echo $item['sex_name']; ?></span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Loại:</span>
                    <span><?php echo $item['variant_name']; ?></span>
                </div>
            </div>

            <div class="size-selector">
                <?php 
                $sizes = explode(',', $item['available_sizes']);
                foreach ($sizes as $size): 
                ?>
                    <button class="size-btn" onclick="selectSize(this)"><?php echo $size; ?></button>
                <?php endforeach; ?>
            </div>

            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
                Thêm vào giỏ hàng
            </button>

            <div class="product-description">
                <h3>Mô tả sản phẩm</h3>
                <div><?php echo nl2br($item['description']); ?></div>
            </div>
        </div>
    </div>

    <script>
        function changeMainImage(src, thumbnail) {
            document.getElementById('mainImage').src = src;
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            // Add active class to clicked thumbnail
            thumbnail.classList.add('active');
        }

        function selectSize(button) {
            document.querySelectorAll('.size-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');
        }
    </script>
    <?php
        } else {
            echo "<div style='text-align: center; padding: 50px;'>Không tìm thấy sản phẩm</div>";
        }
    } else {
        echo "<div style='text-align: center; padding: 50px;'>Không tìm thấy mã sản phẩm</div>";
    }
    ?>
</body>
</html> 