
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$dir = "/WEB_2/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3"; // Đường dẫn đến thư mục chứa ảnh
$images = glob($dir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

foreach ($images as $image) {
    echo "<img src='$image' style='max-width: 200px; margin: 10px;'/>";
}
    ?>
    <!-- <div class="product-details">
        <h1>Giày chạy bộ Boom Infinity 2 nữ ARVS016-3</h1>
        <p>Giá: 1.500.000 VNĐ</p>
        <p>Mô tả: Giày chạy bộ Boom Infinity 2 nữ ARVS016-3 là sự kết hợp hoàn hảo giữa thiết kế hiện đại và công nghệ tiên tiến, mang đến trải nghiệm chạy bộ tuyệt vời cho phái đẹp.</p>
        <button>Thêm vào giỏ hàng</button>
    </div> -->
</body>
</html>

