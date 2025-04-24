<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page Layout</title>
    <link rel="stylesheet" href="/WEB_2/public/assets/css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
</head>
<body>
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
<script src="/WEB_2/public/assets/js/script.js"></script>
</html>
