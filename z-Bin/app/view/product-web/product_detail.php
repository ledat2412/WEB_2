<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="/WEB_2/public/assets/css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/WEB_2/app/view/product/product_detail.css">
</head>
<body>
    <div class="product-detail">
        <div class="product-images">
            <?php if (!empty($image_urls)): ?>
                <img src="<?php echo $image_urls[0]; ?>" class="main-image" id="mainImage" onclick="openModal(this.src)">
                <div class="thumbnail-container">
                    <?php foreach ($image_urls as $index => $url): ?>
                        <img src="<?php echo $url; ?>" class="thumbnail" onclick="changeMainImage(this.src, this)">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- ... Thông tin sản phẩm ... -->
    </div>
    <!-- Modal -->
    <div id="imageModal" class="modal" data-images='<?php echo json_encode($image_urls); ?>'>
        <span class="close" onclick="closeModal()">&times;</span>
        <button id="prevBtn" class="modal-nav">&#10094;</button>
        <img class="modal-content" id="modalImage">
        <button id="nextBtn" class="modal-nav">&#10095;</button>
    </div>
    <script src="/WEB_2/app/view/product/product_detail.js"></script>
</body>
</html>
