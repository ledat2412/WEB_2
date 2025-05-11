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
                        <h3 style="font-weight: 400; font-size: 20px;">Bạn chắc chắn muốn xóa này?</h3>
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
                <a href="../../view/html/admin.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../../view/html/Quanlycauhinh.php#">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="../../controller/handle/listProduct_contronller.php ">
                    <i class="fa-solid fa-shop"></i>
                    <span class="text">Danh sách</span>
                </a>
            </li>
            <li>
                <a href="#">
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
                    <h1>Dashboard</h1>
                    <ul class="list-position">
                        <li>
                            <a href="../../view/html/admin.php">Home</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a href="../../view/html/admin.php">Đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="box-order">
                <li>
                    <i class="fa-solid fa-box"></i>
                    <span class="text">
                        <h3>Đã xác nhận</h3>
                        <p>500</p>
                    </span>
                </li>
                <li>
                    <i class="fa-solid fa-box"></i>
                    <span class="text">
                        <h3>Chờ xác nhận</h3>
                        <p>160</p>
                    </span>
                </li>
                <li>
                    <i class="fa-solid fa-box"></i>
                    <span class="text">
                        <h3>Đã giao</h3>
                        <p>5019</p>
                    </span>
                </li>
                <li>
                    <i class="fa-solid fa-box"></i>
                    <span class="text">
                        <h3>Hủy đơn</h3>
                        <p>300</p>
                    </span>
                </li>
            </ul>

            <div class="content-filter">
                <form action="" method="post">
                    <select id="typeOfcondition" name="status">
                        <option value="">Tất cả đơn hàng</option>
                        <option value="pending">pending</option>
                        <option value="processing">processing</option>
                        <option value="completed">completed</option>
                        <option value="cancelled">cancelled</option>
                    </select>
                    <select id="" name="district">
                        <option value="">Tất cả đơn hàng</option>
                        <option value="Quận 1">Quận 1</option>
                        <option value="Quận 2">Quận 2</option>
                        <option value="Quận 3">Quận 3</option>
                        <option value="Quận 4">Quận 4</option>
                        <option value="Quận 5">Quận 5</option>
                        <option value="Quận 6">Quận 6</option>
                        <option value="Quận 7">Quận 7</option>
                        <option value="Quận 8">Quận 8</option>
                        <option value="Quận 9">Quận 9</option>
                        <option value="Quận 10">Quận 10</option>
                        <option value="Quận 11">Quận 11</option>
                        <option value="Quận 12">Quận 12</option>
                        <option value="Quận Tân Phú">Quận Tân Phú</option>
                        <option value="Quận Bình Tân">Quận Bình Tân</option>
                        <option value="Quận Tân Bình">Quận Tân Bình</option>
                        <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                    </select>
                    <button id="filter" type="submit" name="btn_filter">Lọc</button>
                </form>
            </div>

            <div class="time-filter">
                <div class="Date">
                    <label>Từ ngày</label>
                    <input type="date">
                </div>
                <div class="Date">
                    <label>Đến ngày</label>
                    <input type="date">
                </div>
            </div>

            <table class="table-order">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên khách hàng</td>
                        <td>Phương thức thanh toán</td>
                        <td>Địa chỉ</td>
                        <td>Trạng thái</td>
                        <td>Tác vụ</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($order_product)) {
                        $stt = 1;
                        foreach ($order_product as $order) {
                            echo '<tr>';
                            echo '<td data-label="STT">' . $stt++ . '</td>';
                            echo '<td data-label="Tên khách hàng">' . $order['username'] . '</td>';
                            // Sửa lại: kiểm tra tồn tại key id_user hoặc id_users
                            $user_id = isset($order['id_users']) ? $order['id_users'] : (isset($order['id_user']) ? $order['id_user'] : '');
                            echo '<td data-label="Phương thức thanh toán">' . $order['payment_method']   . '</td>';
                            echo '<td data-label="Địa chỉ">' .  $order['address'] . '</td>';
                            echo '<td class="delivery" data-label="Trạng thái"><span>' . $order['status'] . '</span></td>';
                            echo '<td data-label="Tác vụ">
                                        <div class="dropdown" style="position: relative; display: inline-block;">
                                            <i class="fa-solid fa-pen-to-square" onclick="toggleDropdown(this)" style="cursor: pointer;" title="Cập nhật trạng thái"></i>
                                            <div class="dropdown-menu" style="display: none; position: absolute; top: 25px; left: -130px; background: white; border: 1px solid #ccc; padding: 5px; z-index: 1000; border-radius: 4px;">
                                                <form action="" method="post">
                                                    <input type="hidden" name="order_id" value="' . $order['id_order'] . '">
                                                    <select name="status" style="padding: 5px; width: 150px;">
                                                        <option disabled selected>-- Chọn trạng thái --</option>
                                                            <option value="pending">pending</option>
                                                            <option value="processing">processing</option>
                                                            <option value="completed">completed</option>
                                                            <option value="cancelled">cancelled</option>
                                                    </select>
                                                    <button type="submit" name="update_status">Cập nhật</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
        </main>
    </section>
    <script>
        function toggleDropdown(icon) {
            const menu = icon.nextElementSibling;
            const allMenus = document.querySelectorAll('.dropdown-menu');
            allMenus.forEach(m => {
                if (m !== menu) m.style.display = 'none';
            });
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>

    <script src="/admin/js/admin.js"></script>
    <script src="/admin/js/chart-bar.js"></script>
    <!-- <script src ="../../../public/js/LocDonHang.js"></script> -->
    <script src="/admin/js/Click.js"></script>
</body>

</html>