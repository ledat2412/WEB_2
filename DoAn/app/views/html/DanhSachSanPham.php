<?php 
    include "../../models/tables/database.php";
    include "../../models/tables/product.php";
    include "../../models/tables/description.php";
    include "../../models/tables/sex.php";
    include "../../models/tables/color.php";
    include "../../models/tables/material.php";
    include "../../models/tables/product_variant.php";

    $db = new database();

    $DataProduct = $db->getData("SELECT * FROM PRODUCT");  
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
                    <a href="#">
                        <button class="warning-btn">Có</button>
                    </a>
                    <a href="#">
                        <button class="warning-btn">Không</button>
                    </a>
                </div>
            </div>
        </div>
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
                <a href="#">
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
            <div class="image-contain">
                <a href="#" class="infor">
                    <button class="Button">
                        <img src="/img/ảnh đại diện.jpg" alt="ảnh đại diện">
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
                            <a href="../../views/html/admin.php">Home</a>
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
                    <a href="../html/ThemSanPhamMoi.php">
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
                            $index = 1; // Đếm số thứ tự
                            foreach ($DataProduct as $product) {
                                echo '<tr>';
                                echo '<td>' . $index++ . '</td>';
                                echo '<td><img src="' . $product["picture_path"] . '" alt="Hình ảnh" style="width: 70px; height: 70px;"></td>';
                                echo '<td>' . $product["product_name"] . '</td>';
                                echo '<td>' . number_format($product["price"], 0, ',', '.') . ' VND</td>';
                                echo '<td>' . $product["stock"] . '</td>';
                                echo '<td>' . $product["color_id"] . '</td>'; // Thay bằng tên màu nếu có
                                echo '<td>' . $product["material_id"] . '</td>'; // Thay bằng tên vật liệu nếu có
                                echo '<td>' . $product["sex_id"] . '</td>'; // Thay bằng giới tính nếu có
                                echo '<td>' . $product["description_id"] . '</td>'; // Thay bằng mô tả nếu có
                                echo '<td>
                                        <a href="../../views/html/SuaSanPham.php?product_id=' . $product["product_id"] . '">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="#warning-notify" onclick="deleteProduct(' . $product["product_id"] . ')">
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
    <script src ="../../../public/js/admin.js"></script>
    <script src ="../../../public/js/chart-bar.js"></script>
    <script src="../../../public/js/Click.js"></script>
</body>
</html>