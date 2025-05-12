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
            <!-- <a href="#modal" class="open-modal-button">Contact Us</a>
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
            </div> -->
        </div>
        <!-- Div Center -->
        <div class="header-center">
            <a href="/WEB_2/Lining"><img class="logo" src="/WEB_2/public/assets/img/logo_compact.png" alt="logo" /></a>
            <!-- <a href="/WEB_2/app/controller/main.php?act=home"><img class="logo" src="/WEB_2/public/img/logo_compact.png" alt="logo" /></a> -->
        </div>
        <!-- Div Right -->
        <div class="header-right">
            <!-- Tìm kiếm nâng cao sản phẩm -->
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/model/product.php";
            $productModel = new Product();
            $allProducts = $productModel->getAllProducts();
            // Lọc sản phẩm không trùng nhau theo product_name và shoe_code
            $uniqueProducts = [];
            $seen = [];
            foreach ($allProducts as $product) {
                $key = $product['product_name'] . '|' . $product['shoe_code'];
                if (!isset($seen[$key])) {
                    $uniqueProducts[] = $product;
                    $seen[$key] = true;
                }
            }
            $products = $uniqueProducts;
            ?>
            <div class="search-box" style="position:relative;">
                <input 
                    type="text" 
                    id="product-search-input" 
                    class="search-text"
                    placeholder="Tìm kiếm......" 
                    autocomplete="off"
                    oninput="showProductSuggestions(this.value)"
                >
                <button class="search-btn" type="button" onclick="searchProductByInput()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <ul id="product-suggestions" class="suggestion-list" style="display:none;"></ul>
            </div>
            <style>
            .suggestion-list {
                display: none;
                position: absolute;
                z-index: 1000;
                background: #fff;
                width: 100%;
                border: 1px solid #ccc;
                max-height: 220px;
                overflow-y: auto;
                margin: 0;
                padding: 0;
                list-style: none;
                top: 100%;
                left: 0;
            }
            .suggestion-list li {
                padding: 8px 12px;
                border-bottom: 1px solid #eee;
                cursor: pointer;
                background: #fff;
            }
            .suggestion-list li:last-child {
                border-bottom: none;
            }
            .suggestion-list li:hover {
                background: #f5f5f5;
                color: #ec2a2a;
            }
            .suggestion-list strong {
                color: #333;
            }
            .suggestion-list .code {
                color: #888;
                font-size: 90%;
                margin-left: 8px;
            }
            /* Hiệu ứng ẩn/hiện input */
            .search-box .search-text {
                width: 0;
                padding: 0;
                opacity: 0;
                pointer-events: none;
                border: none;
                background: var(--header-color);
                transition: all 0.25s;
            }
            .search-box:hover .search-text,
            .search-box:focus-within .search-text,
            .search-text:focus {
                width: 240px;
                padding: 10px 20px;
                opacity: 1;
                pointer-events: auto;
                border-radius: 30px;
                background: var(--search-color);
                border: none;
            }
            .search-box .search-btn {
                z-index: 2;
                background: var(--header-color);
                border-radius: 30px;
                transition: background 0.25s;
            }
            .search-box:hover .search-btn,
            .search-box:focus-within .search-btn {
                background: var(--search-color);
            }
            </style>
            <script>
                const products = [
                    <?php
                    $arr = [];
                    foreach($products as $product) {
                        $arr[] = '{id: "' . addslashes($product['id_product']) . '", name: "' . addslashes(htmlspecialchars($product['product_name'], ENT_QUOTES)) . '", code: "' . addslashes(htmlspecialchars($product['shoe_code'], ENT_QUOTES)) . '"}';
                    }
                    echo implode(',', $arr);
                    ?>
                ];
                function showProductSuggestions(query) {
                    const suggestionBox = document.getElementById('product-suggestions');
                    suggestionBox.innerHTML = '';
                    if (!query.trim()) {
                        suggestionBox.style.display = 'none';
                        return;
                    }
                    const q = query.toLowerCase();
                    const matches = products.filter(p => 
                        (p.name + ' ' + p.code).toLowerCase().includes(q)
                    );
                    if (matches.length === 0) {
                        suggestionBox.style.display = 'none';
                        return;
                    }
                    matches.forEach(p => {
                        const li = document.createElement('li');
                        li.innerHTML = `<strong>${p.name}</strong> <span class="code">(${p.code})</span>`;
                        li.onclick = () => {
                            window.location.href = `/WEB_2/app/controller/main.php?act=products&action=product_detail&id=${encodeURIComponent(p.id)}`;
                        };
                        suggestionBox.appendChild(li);
                    });
                    suggestionBox.style.display = 'block';
                }
                function searchProductByInput() {
                    const val = document.getElementById('product-search-input').value.trim().toLowerCase();
                    if (!val) return;
                    const found = products.find(p => (p.name + ' ' + p.code).toLowerCase() === val);
                    if (found) {
                        window.location.href = `/WEB_2/app/controller/main.php?act=products&action=product_detail&id=${encodeURIComponent(found.id)}`;
                    } else {
                        showProductSuggestions(val);
                    }
                }
                document.addEventListener('click', function(e) {
                    if (!document.getElementById('product-search-input').contains(e.target)) {
                        document.getElementById('product-suggestions').style.display = 'none';
                    }
                });
            </script>
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
                    // Lấy số lượng sản phẩm trong giỏ hàng của user hiện tại
                    require_once $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/model/cart.php";
                    $cartModel = new Cart();
                    $user_id = $_SESSION['user_id'] ?? null;
                    $cart_count = 0;
                    if ($user_id) {
                        $cart_items = $cartModel->getCartByUser($user_id);
                        $cart_count = 0;
                        foreach ($cart_items as $item) {
                            $cart_count += $item['quantity'];
                        }
                    }
                    $cart_count_display = ($cart_count > 99) ? '99+' : $cart_count;
                    echo '<a href="/WEB_2/cart" class="left-icon-shopping">
                        <i class="fa-solid fa-cart-shopping" id="icon-shopping"></i>';
                    if ($cart_count > 0) {
                        echo '<div class="total-products">' . $cart_count_display . '</div>';
                    }
                    echo '</a>';
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
            <!-- <li>
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
            </li> -->
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
                <li><a href="/WEB_2/products/giaychaybo">Giày chạy bộ</a></li>
                <li><a href="/WEB_2/products/giaybongro">Giày bóng rổ</a></li>
                <li><a href="/WEB_2/products/giaythoitrang">Giày thời trang</a></li>
                <li><a href="/WEB_2/products/giaycaulong">Giày cầu lông</a></li>
            </ul>

            <li><a href="/WEB_2/app/view/log/signin.php">Giỏ hàng</a></li>

            <li>
                <!-- <div class="contact-us" id="contactUs">
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
                </div> -->
            </li>
        </ul>
    </div>
</div>

</html>