<?php 
    include "../../models/tables/database.php";
    include "../../models/tables/product.php";
    include "../../models/tables/description.php";
    include "../../models/tables/sex.php";
    include "../../models/tables/color.php";
    include "../../models/tables/material.php";
    include "../../models/tables/product_variant.php";

    $db = new database();

    if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
        $id = $_GET['product_id'];
        $sql = ("SELECT P.product_id, P.product_name, P.stock, P.price, P.picture_path, C.color_name, M.material_name, S.sex_name, V.product_variant_name, D.description_content
            FROM PRODUCT P
            JOIN COLORS C ON P.color_id = C.color_id
            JOIN MATERIALS M ON P.material_id = M.material_id
            JOIN SEX S ON P.sex_id = S.sex_id
            JOIN PRODUCT_VARIANT V ON P.product_variant_id = V.product_variant_id
            JOIN DESCRIPTIONS D ON P.description_id = D.description_id
            WHERE P.product_id = '$id'");
        $DataProduct = $db->getData($sql);
        
        if (is_array($DataProduct) && count($DataProduct) > 0) {
            $product = $DataProduct[0];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST["btn_repair"])) {
                    $nameNew = $_POST["nameNew"];
                    $variantNew = trim($_POST["variantNew"]);
                    $stockNew = $_POST["stockNew"];
                    $priceNew = $_POST["priceNew"];
                    $sexNew = $_POST["sexNew"];
                    $colorNew = $_POST["colorNew"];
                    $descriptionNew = $_POST["descriptionNew"];
                    $materialNew = trim($_POST["materialNew"]);
                     // Xử lý ảnh
                    if (!empty($_FILES["pictureNew"]["name"])) {
                        $pictureNew = $_FILES["pictureNew"]["name"];
                        $target_dir = "../../../public/img/";
                        $target_file = $target_dir . basename($pictureNew);
                        move_uploaded_file($_FILES["pictureNew"]["tmp_name"], $target_file);
                    } else {
                        $pictureNew = $product['picture_path']; // giữ ảnh cũ nếu không upload mới
                    }


                    if ($nameNew != $product['product_name'] || $variantNew != $product['product_variant_name'] || $stockNew != $product['stock'] || $priceNew != $product['price'] || $pictureNew != $product['picture_path'] || $materialNew != $product['material_name'] || $descriptionNew != $product['description_content'] || $sexNew != $product['sex_name'] || $colorNew != $product['color_name']) {
                        $updateData = $db->handle("UPDATE PRODUCT SET
                            product_name = '$nameNew',
                            stock = '$stockNew',
                            price = '$priceNew',
                            picture_path = '$pictureNew',
                            material_id = (SELECT material_id FROM MATERIALS LIMIT 1),                     
                            sex_id = (SELECT sex_id FROM SEX LIMIT 1),
                            color_id = (SELECT color_id FROM COLORS LIMIT 1),
                            product_variant_id = (SELECT product_variant_id FROM PRODUCT_VARIANT LIMIT 1),
                            description_id = (SELECT description_id FROM DESCRIPTIONS LIMIT 1)
                            WHERE product_id = '$id'");
                    }
                }
            } 
        }
        else {
            die("Không tìm thấy sản phẩm hoặc lỗi truy vấn.");
        }
    }
    else {
        die("Không nhận được ID sản phẩm.");
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
            <form class="repair" method="POST" action=""  enctype="multipart/form-data">
                <div class="repair-content">
                    <div class="repair-heading">
                        <span>Thông tin sản Phẩm<span>
                    </div>
                    <div class="repair-data">
                        <div class="repair-infor">
                            <label for="">Hình ảnh:</label>
                            <br>
                            <div class="image">
                                <input type="file" name="pictureNew" value="<?php echo $product['picture_path']; ?>" style="width: 150px;" alt="Hình sản phẩm">
                            </div>
                        </div>
                        <div class="repair-infor">
                            <label for="">Tên sản phẩm: </label>
                            <br>
                            <input type="text" name="nameNew" value="<?php echo $product['product_name'] ?>">
                        </div>
                        <div class="repair-infor">
                            <label for="">Loại sản phẩm: </label>
                            <br>
                            <input type="text" name="variantNew" value=" <?php echo $product['product_variant_name']?> ">
                        </div>
                        <div class="repair-infor">
                            <label for="">Vật liệu: </label>
                            <br>
                            <input type="text" name="materialNew" value="<?php echo $product['material_name']?>">
                        </div>
                        <div class="repair-infor"> 
                            <label for="">Giá bán: </label>
                            <br>
                            <input type="text" name="priceNew" value="<?php echo $product['price'] ?>">
                        </div>
                        <div class="repair-infor">
                            <label for="">Số lượng: </label>
                            <br>
                            <input type="text" name="stockNew" value="<?php echo $product['stock'] ?>" >
                        </div>
                        <div class="repair-infor">
                            <label for="">Giới tính: </label>
                            <br>
                            <input type="text" name="sexNew" value="<?php echo $product['sex_name'] ?>" >
                        </div>
                        <div class="repair-infor">
                            <div class="color-pick">
                                <label for="">Màu</label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="red">
                                    <span class="color-circle" style="background-color: red;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="blue">
                                    <span class="color-circle" style="background-color: blue;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="yellow">
                                    <span class="color-circle" style="background-color: yellow;"></span>
                                </label>
                                <label class="color-option">
                                    <input type="radio" name="colorNew" value="pink">
                                    <span class="color-circle" style="background-color: pink;"></span>
                                </label>
                            </div>
                        </div>
                        <div class="repair-infor">
                            <label for="">Mô tả: </label>
                            <br>
                            <textarea name="descriptionNew" style="width: 100%; resize: none; margin-top: 5px;"><?php echo $product['description_content'] ?></textarea>
                        </div>
                        <div class="repair-submit">
                            <a href="../../views/html/DanhSachSanPham.php" class="return">
                                <button>Thoát</button>
                            </a>
                            <input type="submit" name="btn_repair" value="Sửa Thông Tin">
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>
    <script src ="/admin/js/admin.js"></script>
    <script src ="/admin/js/chart-bar.js"></script>
</body>
</html>