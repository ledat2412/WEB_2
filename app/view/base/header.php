<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Li-Ning</title>
    <link rel="stylesheet" href="/WEB_2/public/assets/css/base.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/header.css">
    <link rel="icon" href="/WEB_2/public/assets/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="/WEB_2/public/assets/js/header.js"></script>
</head>

<div class="all-header-:v">
    <!-- Header -->
    <header class="header">
        <!-- Div Left -->
        <div class="header-left">
            <a href="#modal" class="open-modal-button">Contact Us</a>
            <div id="modal" class="modal-background">
                <a href="#!" class="modal-overlay"></a>
                <div class="modal-content">
                    <h2>Gửi tin nhắn</h2>
                    <form class="contact-form">
                        <label for="name">Tên của bạn:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Tin nhắn:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>

                        <button type="submit">Gửi</button>
                    </form>
                    <a href="#!" class="close-button"><i class="fa-solid fa-x"></i></a>
                </div>
            </div>
        </div>
        <!-- Div Center -->
        <div class="header-center">
            <a href="/WEB_2/Lining"><img class="logo" src="/WEB_2/public/assets/img/logo_compact.png" alt="logo" /></a>
            <!-- <a href="/WEB_2/app/controller/main.php?act=home"><img class="logo" src="/WEB_2/public/img/logo_compact.png" alt="logo" /></a> -->
        </div>
        <!-- Div Right -->
        <div class="header-right">
            <form action="/web/product-web/giaychaybouser.html" class="search-box">
                <input type="text" placeholder="Tìm kiếm" class="search-text" list="suggestions">
                <datalist id="suggestions">
                    <option value="Giày thể thao Li-Ning" data-url="/web/product-web/giaychaybouser.html">Giày thể thao Li-Ning</option>
                    <option value="Áo thun thể thao" data-url="/web/product-web/giaychaybouser.html">áo</option>
                    <option value="Quần shorts tập gym" data-url="/web/product-web/giaychaybouser.html">quần</option>
                    <option value="Áo khoác gió" data-url="/web/product-web/giaychaybouser.html">áo</option>
                    <option value="Balo thể thao" data-url="/web/product-web/giaychaybouser.html">balo</option>
                    <option value="Tất thể thao Li-Ning" data-url="/web/product-web/giaychaybouser.html">tất</option>
                </datalist>
                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <div class="user-icon" id="non-log">
                <button class="dropdown-btn"><i class="fa-regular fa-user"></i></button>
                <div class="dropdown-content">
                    <?php
                        if(isset($_SESSION['username'])) {
                            // Menu cho người dùng đã đăng nhập
                            echo '<a href="/WEB_2/profile" class="icon-user-btn">Thông tin</a>';
                            echo "\n";
                            echo '<a href="/WEB_2/logout" class="icon-user-btn">Đăng xuất</a>';
                        } else {
                            // Menu cho khách
                            echo '<a href="/WEB_2/login" class="icon-user-btn">Đăng nhập</a>';
                            echo "\n";
                            echo '<a href="/WEB_2/register" class="icon-user-btn">Đăng ký</a>';
                        }
                    ?>
                </div>
            </div>

            <div class="guest-icon-shopping">
                <?php
                if(isset($_SESSION['username'])) {
                    echo '<a href="/WEB_2/app/controller/main.php?act=cart" class="left-icon-shopping">
                    <i class="fa-solid fa-cart-shopping" id="icon-shopping"></i>
                    <div class="total-products">3</div>
                </a>';
                } else {
                    echo '<a href="/WEB_2/app/view/log/signin.php" class="guest-left-icon-shopping">
                    <i class="fa-solid fa-cart-shopping" id="icon-shopping"></i>
                </a>';
                }
                ?>
            </div>
        </div>
        <!-- Icon Menu for responsive -->
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
    </header>
    <!-- Product Menu (PC Only) -->
    <nav class="product-menu">
        <ul>
            <li><a href="/WEB_2/products/giaychaybo">Giày chạy bộ</a></li>
            <li><a href="/WEB_2/products/giaybongro">Giày bóng rổ</a></li>
            <li><a href="/WEB_2/products/giaythoitrang">Giày thời trang</a></li>
            <li><a href="/WEB_2/products/giaycaulong">Giày cầu lông</a></li>
        </ul>
    </nav>
    <!-- Overlay for background dimming -->
    <div class="overlay" id="overlay" onclick="toggleMenu()"></div>
    <!-- Responsive Menu -->
    <div class="responsive-menu" id="responsiveMenu">
        <ul>
            <!-- Mục tìm kiếm -->
            <li>
                <div class="search-wrapper">
                    <input type="text" id="searchInput" class="search-input" placeholder="Tìm kiếm..." onkeyup="searchMenu()" onkeydown="handleEnter(event)" list="suggestions">
                    <datalist id="suggestions">
                        <option value="Giày thể thao Li-Ning" data-url="/web/product-web/giaychaybouser.html">Giày thể thao Li-Ning</option>
                        <option value="Áo thun thể thao" data-url="/web/product-web/giaychaybouser.html">Áo thun thể thao</option>
                        <option value="Quần shorts tập gym" data-url="/web/product-web/giaychaybouser.html">Quần shorts tập gym</option>
                        <option value="Áo khoác gió" data-url="/web/product-web/giaychaybouser.html">Áo khoác gió</option>
                        <option value="Balo thể thao" data-url="/web/product-web/giaychaybouser.html">Balo thể thao</option>
                        <option value="Tất thể thao Li-Ning" data-url="/web/product-web/giaychaybouser.html">Tất thể thao Li-Ning</option>
                    </datalist>
                </div>
            </li>
            <!-- Các mục menu khác -->
            <li onclick="toggleSubMenu1()">Tài khoản</li>
            <ul class="sub-menu" id="subMenu1">
                <?php
                    if(isset($_SESSION['username'])) {
                        // Menu cho người dùng đã đăng nhập
                        echo '<li><a href="/WEB_2/profile" class="icon-user-btn">Thông tin</a></li>';
                        echo "\n";
                        echo '<li><a href="/WEB_2/logout" class="icon-user-btn">Đăng xuất</a></li>';
                    } else {
                        // Menu cho khách
                        echo '<li><a href="/WEB_2/login" class="icon-user-btn">Đăng nhập</a></li>';
                        echo "\n";
                        echo '<li><a href="/WEB_2/register" class="icon-user-btn">Đăng ký</a></li>';
                    }
                ?>
            </ul>

            <li onclick="toggleSubMenu2()">Sản phẩm</li>
            <ul class="sub-menu" id="subMenu2">
                <li><a href="/WEB_2/products/giaybongro">Giày bóng rổ</a></li>
                <li><a href="/WEB_2/products/giaychaybo">Giày chạy bộ</a></li>
                <li><a href="/WEB_2/products/giaythoitrang">Giày thời trang</a></li>
                <li><a href="/WEB_2/products/giaycaulong">Giày cầu lông</a></li>
            </ul>

            <li><a href="/WEB_2/app/view/log/signin.php">Giỏ hàng</a></li>

            <li>
                <div class="contact-us" id="contactUs">
                    <h2>Liên hệ với chúng tôi</h2>
                    <form action="submit-form.php" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Tên của bạn:</label>
                            <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email của bạn:</label>
                            <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Tin nhắn:</label>
                            <textarea id="message" name="message" rows="5" placeholder="Nhập tin nhắn của bạn" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Gửi</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>

</html>