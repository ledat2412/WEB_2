<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/WEB_2/app/view/product/product_detail.css">
</head>
<body>
    <?php if ($product_detail): $item = $product_detail[0]; ?>
    <div class="product-detail">
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
        <div class="product-info">
            <h1 class="product-name"><?php echo $item['product_name']; ?></h1>
            <div class="product-code">Mã sản phẩm: <?php echo $item['shoe_code']; ?></div>
            <div class="product-price"><?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</div>
            <div class="product-meta">
                <div class="meta-item"><span class="meta-label">Màu sắc:</span><span><?php echo $item['color_name']; ?></span></div>
                <div class="meta-item"><span class="meta-label">Chất liệu:</span><span><?php echo $item['material_name']; ?></span></div>
                <div class="meta-item"><span class="meta-label">Giới tính:</span><span><?php echo $item['sex_name']; ?></span></div>
                <div class="meta-item"><span class="meta-label">Loại:</span><span><?php echo $item['variant_name']; ?></span></div>
            </div>
            <div class="size-selector">
                <?php $sizes = explode(',', $item['available_sizes']);
                foreach ($sizes as $size): ?>
                    <button class="size-btn" onclick="selectSize(this)"><?php echo $size; ?></button>
                <?php endforeach; ?>
            </div>
            <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
            <div class="product-description">
                <h3>Mô tả sản phẩm</h3>
                <div><?php echo nl2br($item['description']); ?></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="imageModal" class="modal" data-images='<?php echo json_encode($image_urls); ?>'>
        <span class="close" onclick="closeModal()">&times;</span>
        <button id="prevBtn" class="modal-nav" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);font-size:40px;background:none;border:none;color:white;cursor:pointer;z-index:1001;">&#10094;</button>
        <img class="modal-content" id="modalImage">
        <button id="nextBtn" class="modal-nav" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);font-size:40px;background:none;border:none;color:white;cursor:pointer;z-index:1001;">&#10095;</button>
    </div>
    <script src="/WEB_2/app/view/product/product_detail0.js"></script>
    <?php else: ?>
        <div style='text-align: center; padding: 50px;'>Không tìm thấy sản phẩm</div>
    <?php endif; ?>
</body>
</html>
