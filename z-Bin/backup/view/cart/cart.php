<?php
require_once '../controller/CartController.php';

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: /web/login.html');
    exit();
}

$cartController = new CartController();
$id_user = $_SESSION['user_id'];

// Xử lý cập nhật số lượng (MVC, không dùng AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    $id_cart = $_POST['id_cart'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;
    if ($id_cart > 0 && $quantity > 0) {
        // Gọi qua phương thức public của controller
        $cartController->updateQuantityByIdCart($id_cart, $quantity);
    }
    // Redirect để tránh lỗi F5 gửi lại form
    header('Location: /WEB_2/app/controller/main.php?act=cart');
    exit();
}

// Xử lý xóa sản phẩm (MVC, không dùng AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id_cart = $_POST['id_cart'] ?? 0;
    if ($id_cart > 0) {
        $cartController->removeFromCart($id_cart);
    }
    header('Location: /WEB_2/app/controller/main.php?act=cart');
    exit();
}

// Xử lý xóa toàn bộ giỏ hàng (AJAX, không reload trang)
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
) {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    if (($data['action'] ?? '') === 'clear') {
        if ($cartController->clearCart($id_user)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không thể xóa giỏ hàng']);
        }
        exit();
    }
}

// Lấy dữ liệu giỏ hàng để hiển thị
$cart_items = $cartController->viewCart($id_user);

// Tính tổng giá trị giỏ hàng
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}

$shipping_cost = 40000;
$total_with_shipping = $total + $shipping_cost;
?>

<!DOCTYPE html>
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
        <div class="cart-items" id="cart-items">
            <?php foreach ($cart_items as $item): ?>
                <div class="cart-item" data-id-cart="<?php echo $item['id_cart']; ?>" data-id-product="<?php echo $item['id_product']; ?>">
                    <div class="item-image">
                        <?php
                        $base_path = $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/public/assets/img/Sản Phẩm/";
                        $relative_path = str_replace("../../../public/assets/img/Sản Phẩm/", "", $item['picture_path']);
                        $image_dir = $base_path . $relative_path;
                        $absolute_dir = realpath($image_dir);
                        $main_image = '';
                        if ($absolute_dir && is_dir($absolute_dir)) {
                            $images = array_merge(
                                glob($absolute_dir . '/*.webp') ?: [],
                                glob($absolute_dir . '/*.jpg') ?: [],
                                glob($absolute_dir . '/*.jpeg') ?: [],
                                glob($absolute_dir . '/*.png') ?: []
                            );
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
                        <form method="POST" action="">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_cart" value="<?php echo $item['id_cart']; ?>">
                            <div class="item-quantity">
                                <label for="quantity-<?php echo $item['id_product']; ?>">Số lượng:</label>
                                <button type="button" class="decrease-btn">-</button>
                                <input type="number" id="quantity-<?php echo $item['id_product']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                                <button type="button" class="increase-btn">+</button>
                            </div>
                        </form>
                        <p class="item-subtotal" data-id="<?php echo $item['id_product']; ?>">
                            Tạm tính: <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> ₫
                        </p>
                        <div class="item-actions">
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id_cart" value="<?php echo $item['id_cart']; ?>">
                                <button type="submit" class="remove-item"><i class="fa fa-trash"></i> Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cart-actions">
            <a href="/web/Web-user.html" class="continue-shopping">← Tiếp tục xem sản phẩm</a>
        </div>
        <div class="line"></div>
        <form id="clear-cart-form" method="POST" action="">
            <input type="hidden" name="action" value="clear">
            <button type="button" class="clear-cart">Xóa tất cả</button>
        </form>
    </div>

    <div class="cart-right">
        <h2>Cộng giỏ hàng</h2>
        <div class="line"></div>
        <div class="cart-summary">
            <p>Tạm tính</p>
            <p id="cart-subtotal-display"><?php echo number_format($total, 0, ',', '.'); ?> ₫</p>
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
            <p id="cart-total-display"><?php echo number_format($total_with_shipping, 0, ',', '.'); ?> ₫</p>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.decrease-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = this.nextElementSibling;
            if (input.value > 1) {
                input.value = parseInt(input.value) - 1;
                input.form.submit();
            }
        });
    });
    document.querySelectorAll('.increase-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = this.previousElementSibling;
            input.value = parseInt(input.value) + 1;
            input.form.submit();
        });
    });

    var clearBtn = document.querySelector('.clear-cart');
    if (clearBtn) {
        clearBtn.addEventListener('click', function() {
            if (!confirm('Bạn có chắc muốn xóa tất cả sản phẩm trong giỏ hàng?')) return;
            fetch(window.location.pathname, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ action: 'clear' })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('cart-items').innerHTML = '';
                    // Có thể cập nhật lại tổng tiền ở đây nếu muốn
                } else {
                    alert('Xóa giỏ hàng thất bại: ' + (data.message || ''));
                }
            })
            .catch(() => alert('Lỗi kết nối máy chủ'));
        });
    }
});
</script>
</body>
</html>
