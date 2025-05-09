<<?php
require_once '../controller/CartController.php';
session_start();

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: /WEB_2/login'); 
    exit();
}

$cartController = new CartController();
$id_user = $_SESSION['user_id'];
$cart_items = $cartController->viewCart($id_user);

// Tính tổng giá trị giỏ hàng
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}

$shipping_cost = 40000; // Phí vận chuyển mặc định
$total_with_shipping = $total + $shipping_cost;
?>

?> <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/Web.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="cart-container">
    <div class="cart-left">
    <h1 class="cart-title">Giỏ hàng của bạn</h1>
    <form action="/web/update-cart.php" method="POST">
        <div class="cart-items">
            <?php foreach ($cart_items as $item): ?>
                <div class="cart-item">
                    <div class="item-image">
                        <?php
                        // Xử lý đường dẫn ảnh giống productshow_view.php
                        $base_path = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/";
                        $relative_path = str_replace("../../../public/assets/img/Sản Phẩm/", "", $item['picture_path']);
                        $image_dir = $base_path . $relative_path;
                        $absolute_dir = realpath($image_dir);

                        // Tìm file ảnh thực tế
                        $main_image = '';
                        if ($absolute_dir && is_dir($absolute_dir)) {
                            $webp_images = glob($absolute_dir . '/*.webp') ?: [];
                            $jpg_images = glob($absolute_dir . '/*.jpg') ?: [];
                            $jpeg_images = glob($absolute_dir . '/*.jpeg') ?: [];
                            $png_images = glob($absolute_dir . '/*.png') ?: [];
                            $images = array_merge($webp_images, $jpg_images, $jpeg_images, $png_images);
                            $main_image = !empty($images) ? $images[0] : '';
                        }
                        $url_path = $main_image ? str_replace(['\\', $_SERVER['DOCUMENT_ROOT']], ['/', ''], $main_image) : '';
                        ?>
                        <img src="<?php echo htmlspecialchars($url_path); ?>" alt="product image">
                    </div>
                    <div class="item-details">
                        <a href="/web/SanPham/<?php echo str_replace(' ', '-', $item['product_name']); ?>.html">
                            <h2 class="item-name"><?php echo $item['product_name']; ?></h2>
                        </a>
                        <p class="item-price"><?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</p>
                        <div class="item-size">
                            <label>Size: </label>
                            <span><?php echo $item['size']; ?></span>
                        </div>
                        <div class="item-quantity">
                            <label for="quantity-<?php echo $item['id_product']; ?>">Số lượng:</label>
                            <input type="number" id="quantity-<?php echo $item['id_product']; ?>" name="quantity[<?php echo $item['id_product']; ?>]" value="<?php echo $item['quantity']; ?>" min="1">
                        </div>
                        <p class="item-subtotal">
                            Tạm tính: <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> ₫
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cart-actions">
            <button type="submit" class="update-cart">Cập nhật giỏ hàng</button>
            <a href="/web/Web-user.html" class="continue-shopping">← Tiếp tục xem sản phẩm</a>
        </div>
    </form>
</div>




        <div class="cart-right">
            <h2>Cộng giỏ hàng</h2>
            <div class="line"></div>

            <div class="cart-summary">
                <p>Tạm tính</p>
                <p><?php echo number_format($total, 0, ',', '.'); ?> ₫</p>
            </div>

            <h3>Giao hàng</h3>
            <div class="shipping-options">
                <input type="radio" id="standard" name="shipping" checked>
                <label for="standard">Chuyển phát thường: 40.000 ₫</label><br>
                <input type="radio" id="express" name="shipping">
                <label for="express">Hỏa tốc: 65.000 ₫</label><br>
            </div>

            <div class="change">
                <button class="change-address">Đổi địa chỉ</button>
            </div>

            <div class="payment-method">
                <h4>Chọn hình thức thanh toán</h4>
                <div class="payment-options">
                    <input type="radio" id="cashOnDelivery" name="payment" value="cash">
                    <label for="cashOnDelivery">Thanh toán khi nhận hàng</label><br>
                    <input type="radio" id="creditCard" name="payment" value="card">
                    <label for="creditCard">Thanh toán bằng thẻ Visa/MasterCard</label><br>
                </div>
                <button class="confirm-payment" onclick="window.location.href='/WEB_2/app/view/cart/cart-payment.php'">Xác nhận</button>
            </div>

            <div class="line"></div>

            <div class="total">
                <p>Tổng</p>
                <p><?php echo number_format($total_with_shipping, 0, ',', '.'); ?> ₫</p>
            </div>

            <div class="discount-code">
                <h4>Mã ưu đãi</h4>
                <div class="textdiscotainer">
                    <input type="text" placeholder="Nhập mã ưu đãi">
                    <button>Áp dụng</button>
                </div>
            </div>

            <div class="line"></div>
            <a href="/web/shopcart/chitietdonhang.html"><button class="checkout">Đặt hàng</button></a>
        </div>
    </div>
</body>

</html>
