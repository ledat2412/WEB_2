<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/admin.css">
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
                                <?php if (!empty($product['picture_path'])): ?>
                                    <img src="<?php echo htmlspecialchars($product['picture_path']); ?>" alt="Hình ảnh sản phẩm" style="width: 140px; height: 70px;">
                                <?php else: ?>
                                    <p>Không có hình ảnh</p>
                                <?php endif; ?>
                            </div>
                            <div class="image">
                                <input type="file" name="pictureNew" value="<?php echo $product['picture_path']; ?>" style="width: 200px;" alt="Hình sản phẩm">
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
                            <input type="text" name="variantNew" value="<?php echo htmlspecialchars($product['product_variant_name']); ?>">
                        </div>
                        <div class="repair-infor">
                            <label for="">Vật liệu: </label>
                            <br>
                            <input type="text" name="materialNew" value="<?php echo htmlspecialchars($product['material_name']); ?>">
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
                            <input type="text" name="sexNew" value="<?php echo htmlspecialchars($product['sex_name']); ?>" >
                        </div>
                        <div class="repair-infor">
                            <div class="color-pick">
                                <label for="">Màu</label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="red" <?php if($product['color_name']=='red') echo 'checked'; ?>>
                                    <span class="color-circle" style="background-color: red;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="blue" <?php if($product['color_name']=='blue') echo 'checked'; ?>>
                                    <span class="color-circle" style="background-color: blue;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="yellow" <?php if($product['color_name']=='yellow') echo 'checked'; ?>>
                                    <span class="color-circle" style="background-color: yellow;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="pink" <?php if($product['color_name']=='pink') echo 'checked'; ?>>
                                    <span class="color-circle" style="background-color: pink;"></span>
                                </label>
                            </div>
                        </div>
                        <div class="repair-infor">
                            <label for="">Mô tả: </label>
                            <br>
                            <textarea name="descriptionNew" style="width: 100%; resize: none; margin-top: 5px;"><?php echo htmlspecialchars($product['description_content']); ?></textarea>
                        </div>
                        <div class="repair-submit">
                            <a href="../../controller/handle/listProduct_contronller.php" class="return">Thoát</a>
                            <input type="submit" name="btn_repair" value="Sửa Thông Tin">
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>
    <script src="/WEB_2/public/js/admin.js"></script>
    <script src="/WEB_2/public/js/chart-bar.js"></script>
</body>
</html>