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
            <form class="add-new" method="post" action="" enctype="multipart/form-data">
                <div class="add-product-new">
                    <div class="add-heading-new">
                        <span>Thông tin sản Phẩm<span>
                    </div>
                    <div class="add-data-new">
                        <!-- <div class="add-infor-new">
                            <label for="">STT: </label>
                            <br>
                            <input type="text" required>
                        </div> -->
                        <div class="add-img-new">
                            <label for="">Hình ảnh:</label>
                            <br>
                            <div class="image-upload">
                                <input type="file" id="file" name="product_img" accept="image/*" onchange="previewImage(event)">
                                <img id="preview" src="" alt="Preview" style="display: none;">
                                <div class="preview-text" id="preview-text">Preview</div>
                            </div>
                        </div>
                        <div class="add-infor-new">
                            <label for="">Tên sản phẩm: </label>
                            <br>
                            <input type="text" required name="product_name">
                        </div>
                        <div class="add-infor-new">
                            <label for="">Mã sản phẩm: </label>
                            <br>
                            <input type="text" required name="product_code">
                        </div>
                        <div class="add-infor-new">
                            <label for="">Loại sản phẩm: </label>
                            <br>
                            <select name="product_variant">
                                <?php foreach ($variantList as $variant): ?>
                                    <option value="<?php echo htmlspecialchars($variant['name']); ?>">
                                        <?php echo htmlspecialchars($variant['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="add-infor-new">
                            <label for="">Giá bán: </label>
                            <br>
                            <input type="text" required name="product_price">
                        </div>
                        <div class="add-infor-new">
                            <label for="">Số lượng: </label>
                            <br>
                            <input type="text" required name="product_quantity">
                        </div>
                        <div class="add-infor-new">
                            <label for="">Vật liệu: </label>
                            <br>
                            <select name="product_material">
                                <?php foreach ($materialList as $material): ?>
                                    <option value="<?php echo htmlspecialchars($material['name']); ?>">
                                        <?php echo htmlspecialchars($material['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="add-infor-new">
                            <label for="">Giới tính: </label>
                            <br>
                            <select name="sex">
                                <?php foreach ($sexList as $sex): ?>
                                    <option value="<?php echo htmlspecialchars($sex['name']); ?>">
                                        <?php echo htmlspecialchars($sex['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="add-infor-new">
                            <label for="">Màu sắc: </label>
                            <br>
                            <select name="color">
                                <?php foreach ($colorList as $color): ?>
                                    <option value="<?php echo htmlspecialchars($color['name']); ?>">
                                        <?php echo htmlspecialchars($color['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="add-infor-new">
                            <label for="">Mô tả: </label>
                            <br>
                            <textarea style="width: 770px; resize: none; height: 60px;" name="product_description"></textarea>
                        </div>
                        <div class="add-submit-new">
                            <a href="../../controller/handle/listProduct_contronller.php" class="return-new">
                                Thoát
                            </a>
                            <div class="enter-add-new">
                                <input type="submit" name="btn" value="Thêm sản phẩm">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>
    <script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    <script src ="/WEB_2/public/js/admin.js"></script>
    <script src ="/WEB_2/public/js/chart-bar.js"></script>
</body>
</html>