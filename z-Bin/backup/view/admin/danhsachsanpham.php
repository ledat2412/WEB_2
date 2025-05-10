<?php 
    include "../../../app/model/database.php";
    include "../../../app/model/product.php";
    include "../../../app/model/descriptions.php";
    include "../../../app/model/sex.php";
    include "../../../app/model/colors.php";
    include "../../../app/model/materials.php";
    include "../../../app/model/product_variant.php";

    $db = new database();
    $sql = "SELECT 
            P.id_product AS product_id, P.product_name, P.price, P.stock, P.picture_path,
            C.name AS color_name, M.name AS material_name, S.name AS sex_name, 
            V.name AS variant_name, D.content AS content
            FROM product P
            JOIN colors C ON P.color_id = C.id_color
            JOIN materials M ON P.material_id = M.id_material
            JOIN sex S ON P.sex_id = S.id_sex
            JOIN product_variant V ON P.id_product_variant = V.id_product_variant
            JOIN descriptions D ON P.description_id = D.id_description";

    $DataProduct = $db->getData($sql);

    if(isset($_POST["button_delete"])) {
        $id = $_POST["product_id_delete"];
        $db->handle("DELETE FROM product WHERE id_product = ?", [$id]);
        header("location: danhsachsanpham.php");
        exit();
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
        <div id="warning-notify" class="warning-notify-container notify-container">
            <div class="warning-content">
                <div class="warning-header">
                    <span>
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Thông báo
                    </span>
                </div>
                <div class="warning-body">
                    <span>
                        <h3 style="font-weight: 400; font-size: 20px;">Bạn chắc chắn muốn xóa sản phẩm này?</h3>
                    </span>
                    <form action="" method="POST">
                        <input type="hidden" name="product_id_delete" id="product_id_delete">
                        <button class="warning-btn" type="submit" name="button_delete">Có</button>
                    </form>
                    <button type="button" class="warning-btn"  onclick="closeDeletePopup()">Không</button>
                </div>
            </div>
        </div>
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
                <a href="#">
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
            <div class="image-contain">
                <a href="#" class="infor">
                    <button class="Button">
                        <img src="../../../public/assets/img/ảnh đại diện.jpg" alt="ảnh đại diện">
                    </button>
                </a>
                <div class="button-infor">
                    <div class="infor-ava">
                        <label for="">Họ và Tên:</label>
                        <h3>Tôn Quyền</h3>
                    </div>
                    <div class="infor-ava">
                        <label for="">Quyền hạn:</label>
                        <h3>Admin</h3>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            <div class="heading-title">
                <div class="left">
                    <h1>Danh Sách</h1>
                    <ul class="list-position">
                        <li>
                            <a href="../../view/admin/admin.php">Home</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="">Danh Sách</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="Add-product-container">
                <div class="Add-product">
                    <a href="../../view/admin/themsanphammoi.php">
                        <button class="Add-product-content">
                            <span>
                                &#43; Thêm sản phẩm mới
                            </span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="Product-list-container">
                <table class="Product-list-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Màu sắc</th>
                            <th>Vật liệu</th>
                            <th>Giới tính</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($DataProduct)) {
                            foreach ($DataProduct as $product) {
                                echo '<tr>';
                                echo '<td>' . $product["product_id"]. '</td>';
                                echo '<td><img src="../../../public/assets/img/' . $product["picture_path"] . '" alt="Hình ảnh" style="width: 70px; height: 70px;"></td>';
                                echo '<td>' . $product["product_name"] . '</td>';
                                echo '<td>' . $product["variant_name"] . '</td>';
                                echo '<td>' . $product["price"] . '</td>';
                                echo '<td>' . $product["stock"] . '</td>';
                                echo '<td>' . $product["color_name"] . '</td>'; 
                                echo '<td>' . $product["material_name"] . '</td>'; 
                                echo '<td>' . $product["sex_name"] . '</td>'; 
                                echo '<td> <textarea style="height: 7vh; width: 12vw; resize: none">' . $product["content"] . '</textarea></td>'; 
                                echo '<td>
                                        <a href="../../view/admin/suasanpham.php?product_id=' . urlencode($product["product_id"]) . '">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="deleteProduct(' . $product["product_id"] . ')">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                    </td>';
                                echo '</tr>';
                            }
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </section>
    <script>
        function deleteProduct(id) {
            document.getElementById('product_id_delete').value = id;
            document.getElementById('warning-notify').classList.add('active');
        }
        function closeDeletePopup() {
            document.getElementById('warning-notify').classList.remove('active');
        }
    </script>
    <script src ="../../../public/assets/js/admin.js"></script>
    <script src ="../../../public/assets/js/chart-bar.js"></script>
    <script src="../../../public/assets/js/Click.js"></script>
</body>
</html>