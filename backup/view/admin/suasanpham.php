<?php 
    include("../../../app/model/database.php");
    include("../../../app/model/product.php");
    include("../../../app/model/descriptions.php");
    include("../../../app/model/sex.php");
    include("../../../app/model/colors.php");
    include("../../../app/model/materials.php");
    include("../../../app/model/product_variant.php");

    $db = new database();

    if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
        $id = $_GET['product_id'];
        $sql = ("SELECT P.id_product AS product_id, P.product_name, P.stock, P.price, P.picture_path, 
                C.name AS color_name, M.name AS material_name, S.name AS sex_name, 
                V.name AS variant_name, D.content AS description_content, 
                P.color_id, P.material_id, P.sex_id, P.description_id, P.id_product_variant AS product_variant_id
                FROM product P
                JOIN colors C ON P.color_id = C.id_color
                JOIN materials M ON P.material_id = M.id_material
                JOIN sex S ON P.sex_id = S.id_sex
                JOIN product_variant V ON P.id_product_variant = V.id_product_variant
                JOIN descriptions D ON P.description_id = D.id_description
                WHERE P.id_product = '$id'");
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
                    $description_id = $product['description_id'];
                    $material_id = $product['material_id'];
                    $color_id = $product['color_id'];
                    $variant_id = $product['product_variant_id'];
                    $sex_id = $product['sex_id'];
                     // Xử lý ảnh
                    if (!empty($_FILES["pictureNew"]["name"])) {
                        $pictureNew = $_FILES["pictureNew"]["name"];
                        $target_dir = "../../../public/img/";
                        $target_file = $target_dir . basename($pictureNew);
                        move_uploaded_file($_FILES["pictureNew"]["tmp_name"], $target_file);
                    } else {
                        $pictureNew = $product['picture_path']; // giữ ảnh cũ nếu không upload mới
                    }

                    if ($nameNew != $product['product_name'] || $variantNew != $product['variant_name'] || $stockNew != $product['stock'] || $priceNew != $product['price'] || $pictureNew != $product['picture_path'] || $materialNew != $product['material_name'] || $descriptionNew != $product['description_content'] || $sexNew != $product['sex_name'] || $colorNew != $product['color_name']) {
                        // Cập nhật các bảng con
                        $db->handle("UPDATE descriptions SET content = '$descriptionNew' WHERE id_description = '$description_id'");
                        $db->handle("UPDATE materials SET name = '$materialNew' WHERE id_material = '$material_id'");
                        $db->handle("UPDATE sex SET name = '$sexNew' WHERE id_sex = '$sex_id'");
                        $db->handle("UPDATE colors SET name = '$colorNew' WHERE id_color = '$color_id'");
                        $db->handle("UPDATE product_variant SET name = '$variantNew' WHERE id_product_variant = '$variant_id'");

                        // Cập nhật bảng chính PRODUCT
                        $db->handle("UPDATE product SET
                            product_name = '$nameNew',
                            stock = '$stockNew',
                            price = '$priceNew',
                            picture_path = '$pictureNew'
                            WHERE id_product = '$id'");

                        header("location: DanhSachSanPham.php");
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
            <form class="repair" method="POST" action=""  enctype="multipart/form-data">
                <div class="repair-content">
                    <div class="repair-heading">
                        <span>Thông tin sản phẩm<span>
                    </div>
                    <div class="repair-data">
                        <div class="repair-infor">
                            <label for="">Hình ảnh:</label>
                            <br>
                            <div class="image">
                                <?php if (!empty($product['picture_path'])): ?>
                                    <img src="../../../public/assets/img/<?php echo htmlspecialchars($product['picture_path']); ?>" alt="Hình ảnh sản phẩm" style="width: 140px; height: 70px;">
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
                            <input type="text" name="nameNew" value="<?php echo $product['product_name'] ?>">
                        </div>
                        <div class="repair-infor">
                            <label for="">Loại sản phẩm: </label>
                            <br>
                            <input type="text" name="variantNew" value=" <?php echo $product['variant_name']?> ">
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
                            <a href="DanhSachSanPham.php" class="return">Thoát</a>
                            <input type="submit" name="btn_repair" value="Sửa Thông Tin">
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>
    <script src ="../../../public/assets/js/admin.js"></script>
    <script src ="../../../public/assets/js/chart-bar.js"></script>
</body>
</html>