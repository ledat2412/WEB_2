<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<!-- banner 1 -->
<div class="banner-1">
    <a href="/WEB_2/app/controller/main.php?act=giaychaybo.php">
        <img class="banner-img-1" src="/WEB_2/public/assets/img/Sản Phẩm/Banner/hinh 1.jpg" alt="ảnh pr sản phẩm">
    </a>
</div>
<!-- chọn khân khúc tier  -->
<div class="group-buy">
    <div class="tier">
        <h2 class="tier-heading">Thể Thao</h2>
    </div>
    <div class="tier-list">
        <div class="tier-item">
            <a href="/WEB_2/products/giaychaybo">
                <img src="/WEB_2/public/assets/img/Sản Phẩm/group buy/groupbuy_1_img_compact.jpg">
                <h3>chạy bộ</h3>
            </a>
        </div>
        <div class="tier-item">
            <a href="/WEB_2/products/giaythoitrang">
                <img src="/WEB_2/public/assets/img/Sản Phẩm/group buy/groupbuy_2_img_compact.jpg" href="">
                <h3>thời trang</h3>
            </a>
        </div>
        <div class="tier-item">
            <a href="/WEB_2/products/giaybongro">
                <img src="/WEB_2/public/assets/img/Sản Phẩm/group buy/groupbuy_3_img_compact.jpg" href="">
                <h3>bóng rổ</h3>
            </a>
        </div>
        <div class="tier-item">
            <a href="/WEB_2/products/giaycaulong">
                <img src="/WEB_2/public/assets/img/Sản Phẩm/group buy/groupbuy_4_img_compact.jpg" href="">
                <h3>cầu lông</h3>
            </a>
        </div>
    </div>
</div>
<!-- banner 2 -->
<div class="banner-2">
    <a href="/web/SanPham/Gi%C3%A0y%20ch%E1%BA%A1y%20b%E1%BB%99%20n%E1%BB%AF%20ARHT020-9V.html">
        <img class="banner-img-2" src="/WEB_2/public/assets/img/Sản Phẩm/Banner/hinh 2.jpg" alt="ảnh pr sản phẩm">
    </a>
</div>
<!-- product -->
<div class="product">
    <h1 class="product-heading" id="product-heading-1">Sản phẩm bán chạy</h1>
    <ul class="product-list">
        <?php
        // Lọc trùng tên sản phẩm và chỉ lấy tối đa 8 sản phẩm bán chạy
        $uniqueNames = [];
        $uniqueBestSellers = [];
        if (isset($bestSellers) && is_array($bestSellers)) {
            foreach ($bestSellers as $product) {
                if (!in_array($product['product_name'], $uniqueNames)) {
                    $uniqueNames[] = $product['product_name'];
                    $uniqueBestSellers[] = $product;
                }
                if (count($uniqueBestSellers) >= 8) break;
            }
        }
        ?>
        <?php foreach ($uniqueBestSellers as $product): ?>
            <?php
            // Lấy hình ảnh chính như bên productshow_view.php
            $image_dir = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/" . str_replace("../../../public/assets/img/Sản Phẩm/", "", $product['picture_path']);
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
            <li>
                <div class="product-img">
                    <a href="/WEB_2/products/detail/<?php echo $product['id_product']; ?>" class="product-display">
                        <?php if ($url_path): ?>
                            <img class="image" src="<?php echo $url_path; ?>" alt="">
                        <?php endif; ?>
                    </a>
                    <a class="product-buy" href="/WEB_2/products/detail/<?php echo $product['id_product']; ?>">Mua ngay</a>
                </div>
                <div class="product-name">
                    <a class="name" href="/WEB_2/products/detail/<?php echo $product['id_product']; ?>"><?php echo htmlspecialchars($product['product_name']); ?></a>
                </div>
                <div class="product-price">
                    <?php echo isset($product['price']) ? number_format($product['price']) . ' đ' : ''; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/WEB_2/products?product_type=banchay">
        <h1 class="product-extend">see more <i class="fa-solid fa-chevron-right"></i></h1>
    </a>
    <h1 class="product-heading" id="product-heading-3">Sản Phẩm Phổ Thông</h1>
    <ul class="product-list">
        <?php
        // Lọc trùng tên sản phẩm và chỉ lấy tối đa 16 sản phẩm phổ thông
        $uniqueNames = [];
        $uniqueNormalProducts = [];
        if (isset($normalProducts) && is_array($normalProducts)) {
            foreach ($normalProducts as $product) {
                if (!in_array($product['product_name'], $uniqueNames)) {
                    $uniqueNames[] = $product['product_name'];
                    $uniqueNormalProducts[] = $product;
                }
                if (count($uniqueNormalProducts) >= 16) break;
            }
        }
        ?>
        <?php foreach ($uniqueNormalProducts as $product): ?>
            <?php
            // Lấy hình ảnh chính như bên productshow_view.php
            $image_dir = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/" . str_replace("../../../public/assets/img/Sản Phẩm/", "", $product['picture_path']);
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
            <li>
                <div class="product-img">
                    <a href="/WEB_2/products/detail/<?php echo $product['id_product']; ?>" class="product-display">
                        <?php if ($url_path): ?>
                            <img class="image" src="<?php echo $url_path; ?>" alt="">
                        <?php endif; ?>
                    </a>
                    <a class="product-buy" href="/WEB_2/products/detail/<?php echo $product['id_product']; ?>">Mua ngay</a>
                </div>
                <div class="product-name">
                    <a class="name" href="/WEB_2/products/detail/<?php echo $product['id_product']; ?>"><?php echo htmlspecialchars($product['product_name']); ?></a>
                </div>
                <div class="product-price">
                    <?php echo isset($product['price']) ? number_format($product['price']) . ' đ' : ''; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/WEB_2/products?product_type=phothong">
        <h1 class="product-extend">see more <i class="fa-solid fa-chevron-right"></i></h1>
    </a>
</div>

</html>