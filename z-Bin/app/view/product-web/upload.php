<!-- <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $uploadDir = "assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/";
    
//     // Tạo thư mục nếu chưa tồn tại
//     if (!file_exists($uploadDir)) {
//         mkdir($uploadDir, 0777, true);
//     }

//     // Xử lý từng file được upload
//     foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
//         $file_name = $_FILES["images"]["name"][$key];
//         $file_tmp = $_FILES["images"]["tmp_name"][$key];
//         $file_type = $_FILES["images"]["type"][$key];
//         $file_error = $_FILES["images"]["error"][$key];

//         // Kiểm tra lỗi
//         if ($file_error === 0) {
//             // Kiểm tra loại file
//             $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
//             if (in_array($file_type, $allowed_types)) {
//                 // Tạo tên file mới để tránh trùng lặp
//                 $new_file_name = uniqid() . '_' . $file_name;
//                 $upload_path = $uploadDir . $new_file_name;

//                 // Upload file
//                 if (move_uploaded_file($file_tmp, $upload_path)) {
//                     echo "File $file_name đã được upload thành công.<br>";
//                 } else {
//                     echo "Lỗi khi upload file $file_name.<br>";
//                 }
//             } else {
//                 echo "File $file_name không phải là ảnh hợp lệ.<br>";
//             }
//         } else {
//             echo "Lỗi khi upload file $file_name.<br>";
//         }
//     }
// }

// // Chuyển hướng về trang chính
// header("Location: productshow.php");
// exit();
?>  -->

<?php 
    include "../../models/tables/database.php";
    include "../../models/tables/product.php";
    include "../../models/tables/description.php";
    include "../../models/tables/sex.php";
    include "../../models/tables/color.php";
    include "../../models/tables/material.php";
    include "../../models/tables/product_variant.php";

    $db = new database();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST["btn"])) {
            $product_name = $_POST["product_name"];
            $product_price = $_POST["product_price"];
            $product_description = $_POST["product_description"];
            if (!empty($_FILES["product_img"]["name"])) {
                $product_image = $_FILES["product_img"]["name"];
                $target_dir = "../../../public/img/";
                $target_file = $target_dir . basename($product_image);
                move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file);      
                if (!empty($_FILES["product_img"]["name"])) {
                    echo '<img src="../../../public/img/' . htmlspecialchars($_FILES['product_img']['name']) . '" alt="Hình ảnh" style="width: 70px; height: 70px;">';
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

            $description = $db->handle("INSERT INTO DESCRIPTIONS (description_content) VALUES ('$product_description')");
            $description_id = $db->getInsertId();
            $product_color = $db->handle("INSERT INTO COLORS (color_name) VALUES ('$product_color')");
            $color_id = $db->getInsertId();;
            $product_material = $db->handle("INSERT INTO MATERIALS (material_name) VALUES ('$product_material')");
            $material_id = $db->getInsertId();
            $product_sex = $db->handle("INSERT INTO SEX (sex_name) VALUES ('$product_sex')");
            $sex_id = $db->getInsertId();
            $product_variant = $db->handle("INSERT INTO PRODUCT_VARIANT (product_variant_name) VALUES ('$product_variant')");
            $variant_id = $db->getInsertId();
            $product = $db->handle("INSERT INTO PRODUCT (product_name, picture_path, stock, price, color_id, material_id, sex_id, product_variant_id, description_id)
            VALUES ('$product_name', '$product_image', '$product_quantity', '$product_price','$color_id', '$material_id', '$sex_id', '$variant_id', '$description_id')");

            header("location: DanhSachSanPham.php");

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/admin.css">
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
                <a href="../../views/html/admin.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../../views/html/Quanlycauhinh.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="../../views/html/DanhSachSanPham.php">
                    <i class="fa-solid fa-shop"></i>
                    <span class="text">Danh sách</span>
                </a>
            </li>
            <li>
                <a href="../../views/html/DonHang.php">
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
                <img src="/img/ảnh đại diện.jpg" alt="ảnh đại diện">
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
                                    <input type="radio" name="color" value="red">
                                    <span class="color-circle" style="background-color: blue;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="color" value="red">
                                    <span class="color-circle" style="background-color: yellow;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="color" value="red">
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
<<<<<<< HEAD:z-Bin/app/view/product-web/upload.php
                            <a href="../html/DanhSachSanPham.php" class="return-new">
                                <button>Thoát</button>
=======
                            <a href="DanhSachSanPham.php" class="return-new">
                                Thoát
>>>>>>> Quyen:DoAn/app/views/html/ThemSanPhamMoi.php
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
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
</body>
</html>