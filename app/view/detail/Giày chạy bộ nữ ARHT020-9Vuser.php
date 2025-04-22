<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày chạy bộ nữ ARHT020-1V</title>
    <link rel="stylesheet" href="SanPham.css">
    <link rel="stylesheet" href="/web/Web.css">
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
        <!-- sản phẩm  -->
        <div class="product-container">
            <!-- Thư viện hình ảnh -->
            <div class="image-gallery">
                <img src="https://product.hstatic.net/1000312752/product/97ba75ac1150fc2a6b993797eca03b306f12d6af5c80d5d1377affb38624078f777ed3_b72d1aa7ee8845afbf6434f663e25835.jpg" alt="Giày chạy bộ nam" class="main-image">
                <div class="thumbnail-images">
                    <img src="https://product.hstatic.net/1000312752/product/4b76b114c24853fb6af2bc701b562d6b9a630c895feebc282cb01eb38624078f777ed3_c6d656b09c18472a8653c3879ae15eef.jpg" alt="Hình 2">
                    <img src="https://product.hstatic.net/1000312752/product/bd0473168752400e936f83ca0e0e7f77b592aec7de40601cdf2ca2b38624078f777ed3_6e84c01d7ebd476c84287bb74b5f419a.jpg" alt="Hình 3">
                    <img src="https://product.hstatic.net/1000312752/product/41097e7515345a3bc86d8fd3b62a7077dad581d4e4c4f221f4dfcbb38624078f777ed3_011f98098fc04aa9baa7fdd14856f3f8.jpg" alt="Hình 4">
                </div>
            </div>
    
            <!-- Thông tin sản phẩm -->
            <div class="body-product">
            <div class="product-details">
                <h2>Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V</h2>
                <ul class="body-product-details">
                    <li class="type-1">
                    Loại: 
                    <span>Giày chạy bộ</span>
                    </li>
                    <li class="type-2">
                    Mã SP: 
                     <span>ARPU001-6V</span>                
                    </li>
                </ul>
                
                <div class="price">
                    <p class="old-price">2,444,727₫</p>
                    <P class="new-price">1,980,000đ</P>
                    <p class="discount">Tiết kiệm 464,727₫</p>
                </div>
    
                <!-- Màu sắc và Chất liệu -->
                <div class="product-info">
                    <p>Màu sắc: <span>Milk White</span></p>
                    <p>Vật liệu: <span>TEXTILE + TPU</span></p>
                </div>
    
                <!-- Lựa chọn kích cỡ -->
                <div class="size-selection">
                    <p>Kích cỡ:</p>
                    <button class="size-btn">5.5</button>
                    <button class="size-btn">6</button>
                    <button class="size-btn">6.5</button>
                    <button class="size-btn">7</button>
                    <button class="size-btn">7.5</button>
                 </div>
                 <div class="quantity-selection">
                    <p class="quantity-label">Số lượng:</p> <!-- Thêm dòng này -->
                    <button class="btn-minus">-</button>
                    <input id="quantity" type="text" value="1" />
                    <button class="btn-plus">+</button>
                </div>
                
    
            
                    
    
                <!-- Nút mua hàng -->
                <div class="action-buttons">
                    <button class="add-to-cart">Thêm vào giỏ</button>
                    <button class="buy-now">Mua ngay</button>
                </div>
            </div>
        </div>
        </div>
    
        <script src="script.js"></script>

     <!-- Mô tả sản phẩm -->
    <div class="product-description">
    <h2>Mô Tả Sản Phẩm</h2>
    <h3>Giày chạy bộ Nữ ARHT020-9V</h3>
    <ul>
        <li>Chật liệu:TEXTILE+TPU </li>
        <li>Công nghệ: LIGHT FOAM ULTRA, HEEL LOC, PROBAR LOC, TUF RB</li>
        <li>Dòng sản phẩm :Running/ Chạy bộ</li>
        <li>Xuất xứ : Chính Hãng</li>
    </ul>
    <p>Cấu trúc đế giữa 2 lớp trên và dưới, lớp trên sử dụng công nghệ LI-NING BOOM, mang đến trải nghiệm nhẹ, êm ái, đàn hồi cho người chạy; lớp dưới với chất liệu LIGHT FOAM ULTRA, nhẹ hơn, đàn hồi hơn, khả năng chống mỏi tuyệt vời hơn so với chất liệu EVA truyền thống. Kết cấu nâng cấp cấu trúc của cả đế giữa giúp duy trì sự cân cân bằng biến dạng động, thuận lợi hơn cho việc truyền lực từ gót chân lên bàn chân trước.</p>
    <p>Phần bàn chân trước dày dặn hơn, trải nghiệm tuyệt vời ngay từ bước đầu tiên, nâng tầm trải nghiệm cho việc chạy bộ thêm êm ái và đàn hồi, vị trí phần vểnh lên ở mũi giày được điều chỉnh mang đến cảm giác lăn đều như bánh xe trong quá trình chạy, nâng tầm trải nghiệm cho việc chạy bộ thoải mái hơn, đạt hiệu quả cao hơn.Chất liệu sợi MONO cho phần upper nhẹ, thoáng khí.</p>
    <p>Đế ngoài sử dụng cao su chống trượt GCR, trọng lượng nhẹ, cải thiện độ chống trơn trượt mọi mặt, hiệu suất chống trượt cao hơn 25% so với đế cao su thông thường.</p>
    <p>LIGHT FOAM ULTRA thông qua việc bổ sung nhiều loại chất đàn hồi nhiệt dẻo có đặc tính ưu việt và kết hợp chúng với kỹ thuật biến tính chất liệu đặc biệt khiến chất liệu đế giữa được trộn đều hơn, cấu trúc tế bào chặt chẽ hơn. Đế giữa được làm bằng phương pháp này nhẹ hơn, có độ đàn hồi tốt hơn và đế ít bị biến dạng hơn, cung cấp đủ động năng lưu trữ cho vận động thể thao.</p>

</div>
   <footer>
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
</footer>
</body>
<script src="../script.js"></script>
</html>
