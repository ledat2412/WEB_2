<?php
function getFirstImageUrl($picture_path) {
    if (preg_match('/^https?:\/\//', $picture_path)) {
        return $picture_path;
    }
    $relative_path = str_replace('../../../public', '', $picture_path);
    $base_dir = $_SERVER['DOCUMENT_ROOT'] . '/WEB_2/public';
    $full_path = $base_dir . $relative_path;
    if (is_file($full_path)) {
        return '/WEB_2/public' . $relative_path;
    }
    if (is_dir($full_path)) {
        $extensions = ['webp', 'jpg', 'jpeg', 'png', 'gif'];
        foreach ($extensions as $ext) {
            $files = glob($full_path . "/*.$ext");
            if (!empty($files)) {
                $web_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $files[0]);
                return $web_path;
            }
        }
    }
    return '/WEB_2/public/assets/img/no-image.png';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin</title>
</head>
<body>
    <section id="sidebar">
        <a href="#" class="logo">
            <i class="fa-solid fa-cloud"></i>
            <span class="text">Lining</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="../../view/html/admin.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../../view/html/Quanlycauhinh.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="../../view/html/DanhSachSanPham.php">
                    <i class="fa-solid fa-shop"></i>
                    <span class="text">Danh sách</span>
                </a>
            </li>
            <li>
                <a href="../../view/html/DonHang.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="text">Đơn hàng</span>
                </a>
            </li>
        </ul>
    </section>
    <section id="content">
        <nav>
            <a href="#">
                <i class="fa-solid fa-bars"></i>
            </a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Tìm kiếm">
                    <button type="submit" class="button-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <a href="#" class="infor">
                <img src="/WEB_2/public/assets/img/ảnh đại diện.jpg" alt="ảnh đại diện">
            </a>
        </nav>
        <main>
            <form class="repair" method="POST" action="" enctype="multipart/form-data">
                <div class="repair-content">
                    <div class="repair-heading">
                        <span>Thông tin sản Phẩm<span>
                    </div>
                    <div class="repair-data">
                        <div class="repair-infor">
                            <label for="">Hình ảnh:</label>
                            <br>
                            <div class="image">
                                <img id="preview" src="<?php echo getFirstImageUrl($product['picture_path']); ?>" alt="Hình ảnh sản phẩm" style="width: 140px; height: 70px;">
                            </div>
                            <div class="image">
                                <input type="file" name="pictureNew" id="pictureNew" style="width: 200px;" alt="Hình sản phẩm" onchange="previewImage(event)">
                            </div>
                        </div>
                        <div class="repair-infor">
                            <label for="">Tên sản phẩm: </label>
                            <br>
                            <input type="text" name="nameNew" value="<?php echo htmlspecialchars($product['product_name']); ?>">
                        </div>
                        <div class="repair-infor">
                            <label for="">Loại sản phẩm: </label>
                            <br>
                            <select name="variantNew">
                                <?php foreach ($variantList as $variant): ?>
                                    <option value="<?php echo htmlspecialchars($variant['name']); ?>" <?php if ($product['product_variant_name'] == $variant['name']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($variant['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="repair-infor">
                            <label for="">Vật liệu: </label>
                            <br>
                            <select name="materialNew">
                                <?php foreach ($materialList as $material): ?>
                                    <option value="<?php echo htmlspecialchars($material['name']); ?>" <?php if ($product['material_name'] == $material['name']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($material['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="repair-infor"> 
                            <label for="">Giá bán: </label>
                            <br>
                            <input type="text" name="priceNew" value="<?php echo htmlspecialchars($product['price']); ?>">
                        </div>
                        <div class="repair-infor">
                            <label for="">Số lượng: </label>
                            <br>
                            <input type="text" name="stockNew" value="<?php echo htmlspecialchars($product['stock']); ?>" >
                        </div>
                        <div class="repair-infor">
                            <label for="">Giới tính: </label>
                            <br>
                            <select name="sexNew">
                                <?php foreach ($sexList as $sex): ?>
                                    <option value="<?php echo htmlspecialchars($sex['name']); ?>" <?php if ($product['sex_name'] == $sex['name']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($sex['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="repair-infor">
                            <label for="">Màu sắc: </label>
                            <br>
                            <select name="colorNew">
                                <?php foreach ($colorList as $color): ?>
                                    <option value="<?php echo htmlspecialchars($color['name']); ?>" <?php if ($product['color_name'] == $color['name']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($color['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="repair-infor">
                            <label for="">Mô tả: </label>
                            <br>
                            <textarea name="descriptionNew" style="width: 100%; resize: none; margin-top: 5px;"><?php echo htmlspecialchars($product['description_content']); ?></textarea>
                        </div>
                        <div class="repair-submit">
                            <a href="/WEB_2/admin/products" class="return">Thoát</a>
                            <input type="submit" name="btn_repair" value="Sửa Thông Tin">
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>
    <script src="/WEB_2/public/js/admin.js"></script>
    <script src="/WEB_2/public/js/chart-bar.js"></script>
    <script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('preview');
            output.src = reader.result;
        };
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    </script>
</body>
</html>