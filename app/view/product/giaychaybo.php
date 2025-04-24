<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page Layout</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="/web/Web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
</head>
<body>
    <!-- header -->
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
            <a href="/web/Web.html"><img class="logo" src="/img/logo_compact.png" alt="logo"/></a>
          </div>
          <!-- Div Right -->
          <div class="header-right">
    
            <form action="/web/product-web/giaychaybouser.html" class="search-box" >
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
                  <a href="/web/log/Login.html" class="icon-user-btn">Đăng nhập</a>
                  <a href="/web/log/Register.html" class="icon-user-btn">Đăng ký</a>
              </div>
            </div>
            
            <div class="guest-icon-shopping">
              <a href="/web/log/Login.html" class="guest-left-icon-shopping">
                  <i class="fa-solid fa-cart-shopping" id="icon-shopping"></i>
              </a>  
            </div>
            
            <!-- <div class="filter-icon" id="non-filter">
                <button class="dropdown-filter"><i class="fa-solid fa-filter"></i></button>
                <div class="filter-container">
                    <div class="filter-header">Bộ lọc tìm kiếm</div>

                    <div class="filter-section">
                        <h3>Theo Danh Mục</h3>
                        <div class="filter-options">
                            <div class="filter-option">Giày Chạy Bộ</div>
                            <div class="filter-option">Giày Bóng Rổ </div>
                            <div class="filter-option">Giày Thời Trang</div>
                            <div class="filter-option">Thời Cầu Lông </div>
                        </div>
                    </div>

                    <div class="filter-section">
                        <h3>Nơi Bán</h3>
                        <div class="filter-options">
                            <div class="filter-option">TP. Hồ Chí Minh</div>
                            <div class="filter-option">Hà Nội</div>
                            <div class="filter-option">Đà Nẵng</div>
                            <div class="filter-option">Quận 1</div>
                            <div class="filter-option">Quận 3</div>
                        </div>
                    </div>

                    <div class="filter-section">
                        <h3>Đơn Vị Vận Chuyển</h3>
                        <div class="filter-options">
                            <div class="filter-option">Hỏa Tốc</div>
                            <div class="filter-option">Nhanh</div>
                            <div class="filter-option">Tiết Kiệm</div>
                        </div>
                    </div>

                    <div class="filter-section">
                        <h3>Khoảng giá</h3>
                        <div class="filter-options">
                            <div class="filter-option">Dưới 1 triệu</div>
                            <div class="filter-option">Trên 1 triệu</div>
                        </div>
                    </div>

                    <div class="button-container">
                        <button class="button reset-button">Thiết lập lại</button>
                        <button class="button apply-button">Áp dụng</button>
                    </div>
                </div>
            </div> -->

          </div>
          <!-- Icon Menu for responsive -->
          <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        </header>
        <!-- Product Menu (PC Only) -->
        <nav class="product-menu">
          <ul>
            <li><a href="/web/product-web/giaychaybo.html">Giày bóng rổ</a></li>
            <li><a href="/web/product-web/giaychaybo.html">Giày chạy bộ</a></li>
            <li><a href="/web/product-web/giaychaybo.html">Giày thời trang</a></li>
            <li><a href="/web/product-web/giaychaybo.html">Giày cầu lông</a></li>
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
                <li><a href="/web/log/Login.html">Login</a></li>
                <li><a href="/web/log/Register.html">Register</a></li>
              </ul>
              
              <li onclick="toggleSubMenu2()">Sản phẩm</li>
              <ul class="sub-menu" id="subMenu2">
                <li><a href="/web/product-web/giaychaybo.html">Giày bóng rổ</a></li>
                <li><a href="/web/product-web/giaychaybo.html">Giày chạy bộ</a></li>
                <li><a href="/web/product-web/giaychaybo.html">Giày thời trang</a></li>
                <li><a href="/web/product-web/giaychaybo.html">Giày cầu lông</a></li>
              </ul>
              
              <li><a href="/web/log/Login.html">Giỏ hàng</a></li>

              <li><div class="contact-us" id="contactUs">
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
              </div></li>
            </ul>
        </div>
      </div>
    <!-- Main content -->
    <div class="main-container">
        <!-- sorting bar -->
        <div class="sorting-bar">
            <div class="sorting-options">
                <label for="sorting">Default sorting</label>
                <select id="sorting">
                    <option value="default">Default sorting</option>
                    <option value="price-low-high">Price: Low to High</option>
                    <option value="price-high-low">Price: High to Low</option>
                    <option value="popularity">Popularity</option>
                    <option value="rating">Rating</option>
                </select>
            </div>
            <div class="view-options">
                <button class="view-btn list-view active">
                    <span class="icon">☰</span> 
                </button>
                <button class="view-btn grid-view">
                    <span class="icon">▦</span> 
                </button>
                <button class="view-btn compact-view">
                    <span class="icon" style="color: orange;">▤</span> 
                </button>
            </div>
            <div class="results-info">Showing all 5 results</div>
        </div>
        <!-- sản phẩm và filter -->
        <div class="container">
            <!-- Filter Section on the Left -->
            <aside class="filter-section">
                <div class="filter-header">Bộ lọc tìm kiếm</div>
                <h3>Theo Danh Mục</h3>
                <div class="filter-options">
                    <div class="filter-option">Giày Chạy Bộ</div>
                    <div class="filter-option">Giày Bóng Rổ </div>
                    <div class="filter-option">Giày Thời Trang</div>
                    <div class="filter-option">Thời Cầu Lông </div>
                </div>
                <h3>Nơi Bán</h3>
                <div class="filter-options">
                    <div class="filter-option">TP. Hồ Chí Minh</div>
                    <div class="filter-option">Hà Nội</div>
                    <div class="filter-option">Đà Nẵng</div>
                    <div class="filter-option">Quận 1</div>
                    <div class="filter-option">Quận 3</div>
                </div>
                <h3>Đơn Vị Vận Chuyển</h3>
                <div class="filter-options">
                    <div class="filter-option">Hỏa Tốc</div>
                    <div class="filter-option">Nhanh</div>
                    <div class="filter-option">Tiết Kiệm</div>
                </div>
                <h3>Khoảng giá</h3>
                <div class="filter-options">
                    <div class="filter-option">Dưới 1 triệu</div>
                    <div class="filter-option">Trên 1 triệu</div>
                </div>
                <h3>Màu giày</h3>
                <div class="color-group">
                    <span class="color black"></span>
                    <span class="color red"></span>
                    <span class="color blue"></span>
                    <span class="color green"></span>
                    <span class="color yellow"></span>
                </div>
                <div class="button-container">
                    <button class="button reset-button">Thiết lập lại</button>
                    <button class="button apply-button">Áp dụng</button>
                </div>     
            </aside>

            
            
            <!-- Product Section on the Right -->
            <section class="product-specific">
                <h2 class="product-heading">Running Shoes</h2>
                <ul class="product-list-specific">
                    <li>
                        <div class="product-img">
                            <a href="" class="product-display">
                                <img class="image" src="/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1.jpg" alt="">
                            </a>
                            <a class="product-buy" href="">Mua ngay</a>
                        </div>
                        <div class="product-name">
                            <a class="name" href="">Giày chạy bộ Nam ARMT037-1</a>
                        </div>
                        <div class="product-price">1,850,000</div>
                    </li>
                    <li>
                        <div class="product-img">
                            <a href="" class="product-display">
                                <img class="image" src="/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1.jpg" alt="">
                            </a>
                            <a class="product-buy" href="">Mua ngay</a>
                        </div>
                        <div class="product-name">
                            <a class="name" href="">Giày chạy bộ Nam ARMT037-1</a>
                        </div>
                        <div class="product-price">1,850,000</div>
                    </li>
                    <li>
                        <div class="product-img">
                            <a href="" class="product-display">
                                <img class="image" src="/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1.jpg" alt="">
                            </a>
                            <a class="product-buy" href="">Mua ngay</a>
                        </div>
                        <div class="product-name">
                            <a class="name" href="">Giày chạy bộ Nam ARMT037-1</a>
                        </div>
                        <div class="product-price">1,850,000</div>
                    </li>
                    <li>
                        <div class="product-img">
                            <a href="" class="product-display">
                                <img class="image" src="/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1.jpg" alt="">
                            </a>
                            <a class="product-buy" href="">Mua ngay</a>
                        </div>
                        <div class="product-name">
                            <a class="name" href="">Giày chạy bộ Nam ARMT037-1</a>
                        </div>
                        <div class="product-price">1,850,000</div>
                    </li>
                    <!-- Repeat similar product items as needed -->
                </ul>
            </section>
        </div>
        <!-- pagination -->
        <div class="pageing">
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>  
        </div>
    </div>
    <!-- footer -->
    <div class="footer-main">
        <footer class="footer">
            <div class="footer-information">
                <ul class="footer-list">
                    <div class="footer-heading">
                        <h3 class="heading">LI-NING DISTRIBUTOR IN VIET NAM</h3>
                    </div>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Giới thiệu</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Hệ thống cửa hàng</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Thông tin liên hệ</a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <div class="footer-heading">
                        <h3 class="heading">CHÍNH SÁCH BÁN HÀNG</h3>
                    </div>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Bảo mật</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Thanh toán</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Vận chuyển</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Đổi trả hàng mua online</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Đổi trả hàng mua tại cửa hàng</a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <div class="footer-heading">
                        <h3 class="heading">HỖ TRỢ KHÁCH HÀNG</h3>
                    </div>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Điều khoản dịch vụ</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Hướng dẫn mua hàng</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Hướng dẫn đo size và bảo quản</a>
                    </li>
                    <li class="footer-infor">
                        <a class="footer-name" href="">Hướng dẫn thanh toán</a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <div class="footer-heading">
                        <h3 class="heading">NEWSLETTER</h3>
                    </div>
                    <div class="footer-paragrahp">
                        <p>Đăng ký nhận bản tin để cập nhật <br>những tin tức mới nhất về Li-Ning <br>Distributor in Vietnam</p>
                        <div class="footer-input">
                            <input class="footer-email" type="email" placeholder="Địa chỉ email của bạn">
                            <a class="footer-submit-font" href="">
                                <input class="footer-submit" type="submit" value="Đăng ký">
                            </a>
                        </div>
                    </div>
                    <div class="footer-items">
                        <li class="footer-icon">
                            <a class="icon" href="">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="footer-icon">
                            <a class="icon" href="">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li class="footer-icon">
                            <a class="icon" href="">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li class="footer-icon">
                            <a class="icon" href="">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </footer>
    </div>
</body>
<Script src="/web/script.js"></Script>
</html>


<?php
$dir = "uploads/images/"; // Đường dẫn đến thư mục chứa ảnh
$images = glob($dir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

foreach ($images as $image) {
    echo "<img src='$image' style='max-width: 200px; margin: 10px;'/>";
}
?>z
