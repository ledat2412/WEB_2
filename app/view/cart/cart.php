<?php
require_once '../controller/CartController.php';

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header('Location: /web/login.html');
    exit();
}

$cartController = new CartController();
$id_user = $_SESSION['username']; // Lấy id_user từ session

// Lấy giỏ hàng của người dùng
$cart_items = $cartController->viewCart($id_user);

// Tính tổng giá trị giỏ hàng
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Tính phí vận chuyển mặc định
$shipping_cost = 40000;

// Tổng cộng (bao gồm phí ship)
$total_with_shipping = $total + $shipping_cost;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="/WEB_2/public/assets/css/Web.css">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="/WEB_2/public/img/logo_compact.png" type="image/x-icon">
</head>

<body>
    <div class="cart-container">
        <div class="cart-left">
            <div class="form-price">
                <h1 class="product-title">Sản phẩm</h1>
                <div class="item-price">
                    <p class="price-title">Giá</p>
                    <p class="quantity-title">Số lượng</p>
                    <p class="subtotal-title">Tạm tính</p>
                </div>
            </div>

            <div class="line"></div>

            <!-- Hiển thị từng sản phẩm -->
            <form action="/web/update-cart.php" method="POST">
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item">
                        <img src="<?php echo $item['picture_path']; ?>" alt="product image">
                        <a href="/web/SanPham/<?php echo str_replace(' ', '-', $item['product_name']); ?>.html">
                            <?php echo $item['product_name']; ?>
                        </a>
                        <div class="item-price">
                            <p class="price-title"><?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</p>
                            <input class="quantity-title" type="number" name="quantity[<?php echo $item['id_product']; ?>]" value="<?php echo $item['quantity']; ?>" min="1">
                            <p class="subtotal-title"><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> ₫</p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="line"></div>
                <button type="submit" class="update-cart">Cập nhật giỏ hàng</button>
            </form>

            <a href="/web/Web-user.html"><button class="continue-shopping">← Tiếp tục xem sản phẩm</button></a>
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
