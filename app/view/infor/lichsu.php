<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân</title>
    <link rel="stylesheet" href="/web/Web.css">
    <link rel="stylesheet" href="lichsu.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="main">
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
                <a href="/web/Web-user.html"><img class="logo" src="/img/logo_compact.png" alt="logo"/></a>
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
                      <a href="/infor/thongtincanhan.html" class="icon-user-btn">Thông tin</a>
                      <a href="web.html" class="icon-user-btn">Đăng xuất</a>
                  </div>
                </div>
                
                <div class="icon-shopping">
                  <a href="/web/shopcart/shopcart.html" class="left-icon-shopping">
                      <i class="fa-solid fa-cart-shopping" id="icon-shopping"></i>
                      <div class="total-products">3</div>  <!-- user -->
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
                <li><a href="/web/product-web/giaychaybouser.html">Giày bóng rổ</a></li>
                <li><a href="/web/product-web/giaychaybouser.html">Giày chạy bộ</a></li>
                <li><a href="/web/product-web/giaychaybouser.html">Giày thời trang</a></li>
                <li><a href="/web/product-web/giaychaybouser.html">Giày cầu lông</a></li>
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
                    <li><a href="/infor/thongtincanhan.html">Thông tin</a></li>
                    <li><a href="/web.html">Đăng xuất</a></li>
                </ul>
                
                <li onclick="toggleSubMenu2()">Sản phẩm</li>
                <ul class="sub-menu" id="subMenu2">
                    <li><a href="/web/product-web/giaychaybo.html">Giày bóng rổ</a></li>
                    <li><a href="/web/product-web/giaychaybo.html">Giày chạy bộ</a></li>
                    <li><a href="/web/product-web/giaychaybo.html">Giày thời trang</a></li>
                    <li><a href="/web/product-web/giaychaybo.html">Giày cầu lông</a></li>
                </ul>
                
                <li><a href="/web/shopcart/shopcart.html">Giỏ hàng (3)</a></li>

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
        <!-- infor  -->
        <div class="container">
        <!-- Sidebar -->
            <div class="sidebar">
                <h2>Xin Chào, Phương Nhi Trần Ngọc!</h2>
                <ul>
                    <li><a href="#">Thông Tin Hạng Thành Viên</a></li>
                    <li><a href="/infor/thongtincanhan.html">Thông Tin Cá Nhân</a></li>
                    <li><a href="/infor/lichsu.html">Đơn Hàng</a></li>
                    <li><a href="/infor/diachi.html">Địa Chỉ</a></li>
                    <li><a href="#">Đăng Kí Nhận Thông Báo</a></li>
                    <li><a href="/web/Web.html">Đăng Xuất</a></li>
                </ul>
            </div>
        <!-- Main content -->
            <div class="body-product">
                <div id="titlebar">
                    <ul>
                        <li><a href="#">ĐANG XỬ LÝ</a></li>
                        <li><a href="/infor/sanphamdonhang.html">CHỜ GIAO HÀNG</a></li>
                        <li><a href="#">ĐÃ HOÀN TẤT</a></li>
                        <li><a href="#">LỊCH SỬ MUA HÀNG</a></li>
                        <li><a href="#">LIÊN HỆ</a></li>
                        </ul>
                </div>
                <div class="order">
                    <div class="shop-info">
                        <p class="shop-name">Lining</p>
                        <button>Chat</button>
                        <button>Xem Shop</button>
                        <span class="status">GIAO HÀNG THÀNH CÔNG / HOÀN THÀNH</span>
                    </div>
                    <div class="item">
                    <img src="https://product.hstatic.net/1000312752/product/97ba75ac1150fc2a6b993797eca03b306f12d6af5c80d5d1377affb38624078f777ed3_b72d1aa7ee8845afbf6434f663e25835_grande.jpg" alt="Product Image">
                
                        
                        <div class="item-details">
                            <p>Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V</p>
                            <p>Phân loại hàng: Giày chạy bộ. Mã SP: ARPU001-6V</p>
                            <p>Số lượng: 1</p>
                        </div>
                        <p class="price">2,444,727₫</p>
                    </div>
            
                    <div class="item">
                        <img src="https://product.hstatic.net/1000312752/product/arht020-11v__1__b8df8cdb06de4450a5b4a86ca571b9b3_grande.jpg" alt="Product Image">
                        <div class="item-details">
                            <p>Giày chạy bộ Nữ ARHT020-11V</p>
                            <p>Phân loại hàang: Giày chạy bộ. Mã SP: ARHT020-11V</p>
                            <p>Số lượng: 1</p>
                        </div>
                        <p class="price">1,340,182₫</p>
                    </div>
            
                    <div class="total">
                        <p>Thành tiền: <span>3,784,909</span></p>
                        <button class="review-button">Đánh giá</button>
                        <button class="refund-button">Yêu cầu trả hàng/hoàn tiền</button>
                        </div>
                    </div>
                <div class="order">
                    <div class="shop-info">
                        <p class="shop-name">Lining</p>
                        <button>Chat</button>
                        <button>Xem Shop</button>
                        <span class="status">Giao hàng thành công • HOÀN THÀNH</span>
                    </div>
            
                    <div class="item">
                        <img src="https://product.hstatic.net/1000312752/product/abas081-1h__1__fea18077ad00430eb15339a40e383184.jpg" alt="Product Image">
                        <div class="item-details">
                            <p>Giày bóng rổ nam ABAS081-1</p>
                            <p>Phân loại hàng: Giày bóng rổ. Mã SP: ABAS081-1</p>
                            <p>Số lượng: 1</p>
                        </div>
                        <p class="price">1,980,000₫</p>
                    </div>
            
                    <div class="total">
                        <p>Thành tiền: <span>1,980,000</span></p>
                        <button class="review-button">Đánh giá</button>
                        <button class="refund-button">Yêu cầu trả hàng/hoàn tiền</button>
                        </div>
                    </div>
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
    </div>
    <script src="/web/script.js"></script> 
</body>
</html>
