<?php 
    include("../../../app/model/database.php");
    include("../../../app/model/product.php");
    include("../../../app/model/descriptions.php");
    include("../../../app/model/sex.php");
    include("../../../app/model/colors.php");
    include("../../../app/model/materials.php");
    include("../../../app/model/product_variant.php");

    $db = new database();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST["btn"])) {
            $product_name = $_POST["product_name"];
            $product_price = $_POST["product_price"];
            $product_description = $_POST["product_description"];
            if (!empty($_FILES["product_img"]["name"])) {
                $product_image = $_FILES["product_img"]["name"];
                $target_dir = "../../../public/assets/img/";
                $target_file = $target_dir . basename($product_image);
                move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file);      
                if (!empty($_FILES["product_img"]["name"])) {
                    echo '<img src="../../../public/assets/img/' . htmlspecialchars($_FILES['product_img']['name']) . '" alt="Hình ảnh" style="width: 70px; height: 70px;">';
                }
            } else {
                $product_image = ""; // hoặc xử lý ảnh mặc định
            }

            $product_color = $_POST["color"];
            $product_code = $_POST["product_code"];
            $product_quantity = $_POST["product_quantity"];
            $product_material = $_POST["product_material"];
            $product_sex = $_POST["sex"];
            $product_variant = $_POST["product_variant"];

            // Insert description
            $description = $db->handle("INSERT INTO descriptions (content) VALUES ('$product_description')");
            $description_id = $db->getInsertId();

            // Check if color exists, if not insert it
            $color_result = $db->getData("SELECT id_color FROM colors WHERE name = '$product_color'");
            if (empty($color_result)) {
                $db->handle("INSERT INTO colors (name) VALUES ('$product_color')");
                $color_id = $db->getInsertId();
            } else {
                $color_id = $color_result[0]['id_color'];
            }

            // Check if material exists, if not insert it
            $material_result = $db->getData("SELECT id_material FROM materials WHERE name = '$product_material'");
            if (empty($material_result)) {
                $db->handle("INSERT INTO materials (name) VALUES ('$product_material')");
                $material_id = $db->getInsertId();
            } else {
                $material_id = $material_result[0]['id_material'];
            }

            // Check if sex exists, if not insert it
            $sex_result = $db->getData("SELECT id_sex FROM sex WHERE name = '$product_sex'");
            if (empty($sex_result)) {
                $db->handle("INSERT INTO sex (name) VALUES ('$product_sex')");
                $sex_id = $db->getInsertId();
            } else {
                $sex_id = $sex_result[0]['id_sex'];
            }

            // Check if product variant exists, if not insert it
            $variant_result = $db->getData("SELECT id_product_variant FROM product_variant WHERE name = '$product_variant'");
            if (empty($variant_result)) {
                $db->handle("INSERT INTO product_variant (name) VALUES ('$product_variant')");
                $variant_id = $db->getInsertId();
            } else {
                $variant_id = $variant_result[0]['id_product_variant'];
            }

            // Insert the product
            $product = $db->handle("INSERT INTO product (product_name, shoe_code, picture_path, stock, price, color_id, material_id, sex_id, id_product_variant, description_id)
            VALUES ('$product_name', '$product_code', '$product_image', '$product_quantity', '$product_price', '$color_id', '$material_id', '$sex_id', '$variant_id', '$description_id')");

            header("location: DanhSachSanPham.php");
        }
    }
?>


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
                <a href="../../view/admin/admin.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../../view/admin/Quanlycauhinh.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="../../view/admin/DanhSachSanPham.php">
                    <i class="fa-solid fa-shop"></i>
                    <span class="text">Danh sách</span>
                </a>
            </li>
            <li>
                <a href="../../view/admin/DonHang.php">
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
                <img src="../../../public/assets/img/ảnh đại diện.jpg" alt="ảnh đại diện">
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
                            <input type="text" required name="product_variant">
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
                            <input type="text" required name="product_material">
                        </div>
                        <div class="add-infor-new">
                            <div class="sex">
                                <label for="">Sex: </label>
                                <div class="sex-option" style="display: flex; gap: 20px; align-items: center;">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <input type="radio" name="sex" value="Nữ" style="width: 20px;">
                                        <label for="">Nữ</label>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <input type="radio" name="sex" value="Nam" style="width: 20px;">
                                        <label for="">Nam</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-infor-new">
                            <div class="color-picked">
                                <label for="">Màu: </label>
                                <label class="color-option">
                                    <input type="radio" name="color" value="red">
                                    <span class="color-circle" style="background-color: red;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="color" value="blue">
                                    <span class="color-circle" style="background-color: blue;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="color" value="yellow">
                                    <span class="color-circle" style="background-color: yellow;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="color" value="pink">
                                    <span class="color-circle" style="background-color: pink;"></span>
                                </label> 
                            </div>
                        </div>
                        <div class="add-infor-new">
                            <label for="">Mô tả: </label>
                            <br>
                            <textarea style="width: 770px; resize: none; height: 60px;" name="product_description"></textarea>
                        </div>
                        <div class="add-submit-new">
                            <a href="DanhSachSanPham.php" class="return-new">
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
    <script src ="../../../public/assets/js/admin.js"></script>
    <script src ="../../../public/assets/js/chart-bar.js"></script>
</body>
</html>