<?php
// session_start();
require_once '../controller/CartController.php';
require_once '../model/addresses.php';

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: /WEB_2/login');
    exit();
}

$cartController = new CartController();
$id_user = $_SESSION['user_id'];

$addressModel = new Addresses();
$all_addresses = $addressModel->getAddressesByUser($id_user);

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

// Xử lý xóa toàn bộ giỏ hàng (submit form, reload trang)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'clear') {
    $cartController->clearCart($id_user);
    header('Location: /WEB_2/app/controller/main.php?act=cart');
    exit();
}

// Xử lý đổi địa chỉ (lưu id vào session, không dùng is_default)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'change_address') {
    $new_id = $_POST['address_id'] ?? 0;
    if ($new_id > 0) {
        $_SESSION['selected_address_id'] = $new_id;
        header('Location: /WEB_2/app/controller/main.php?act=cart');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_card_info'])) {
    unset($_SESSION['card_info']);
    unset($_SESSION['card_payment']);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

// Lấy địa chỉ mặc định: ưu tiên địa chỉ đã chọn, nếu chưa có thì lấy địa chỉ đầu tiên
$selected_address = null;
if (isset($_SESSION['selected_address_id'])) {
    foreach ($all_addresses as $addr) {
        if ($addr['id_address'] == $_SESSION['selected_address_id']) {
            $selected_address = $addr;
            break;
        }
    }
}
$default_address = $selected_address ?: (count($all_addresses) ? $all_addresses[0] : null);

// Lấy dữ liệu giỏ hàng để hiển thị
$cart_items = $cartController->viewCart($id_user);

// Tính tổng giá trị giỏ hàng
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}

$shipping_cost = 40000;
$total_with_shipping = $total + $shipping_cost;

// Biến thông báo lỗi
$error_checkout = '';

// Lấy lựa chọn ship_method từ session hoặc mặc định
$selected_ship = $_SESSION['selected_ship_method'] ?? 'standard';
// Lấy lựa chọn payment_method từ session hoặc mặc định
$selected_payment = $_SESSION['selected_payment_method'] ?? (!empty($_SESSION['card_payment']) ? 'card' : 'cash');

// Xử lý khi bấm "Đặt hàng" -> chuyển sang trang xác nhận
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'checkout') {
    // Kiểm tra giỏ hàng rỗng
    if (count($cart_items) === 0) {
        $error_checkout = 'Giỏ hàng của bạn đang trống!';
    } else if (empty($default_address) || empty($default_address['id_address'])) {
        $error_checkout = 'Vui lòng chọn địa chỉ giao hàng trước khi đặt hàng!';
    } else {
        // Kiểm tra phương thức thanh toán
        $payment_method = $_POST['payment_method'] ?? 'cash';
        if ($payment_method === 'card' && empty($_SESSION['card_info'])) {
            $error_checkout = 'Vui lòng nhập thông tin thẻ trước khi thanh toán!';
        }
    }
    // Nếu không có lỗi thì chuyển trang, ngược lại giữ nguyên trang và hiển thị lỗi
    if (empty($error_checkout)) {
        $_SESSION['checkout_info'] = [
            'id_user' => $_SESSION['user_id'],
            'id_address' => $default_address['id_address'] ?? null,
            'payment_method' => $payment_method,
            'ship_method' => $_POST['ship_method'] ?? 'standard',
            'cart_items' => $cart_items,
            'total' => $total,
            'shipping_cost' => ($selected_ship === 'express') ? 65000 : 40000,
            'total_with_shipping' => $total_with_shipping
        ];
        header('Location: /WEB_2/cart/confirm');
        exit();
    }
}

// Xử lý AJAX lưu ship_method vào session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ship_method']) && !isset($_POST['action'])) {
    $_SESSION['selected_ship_method'] = $_POST['ship_method'];
    echo 'ok';
    exit();
}

// Xử lý AJAX lưu payment_method vào session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method']) && !isset($_POST['action'])) {
    $_SESSION['selected_payment_method'] = $_POST['payment_method'];
    echo 'ok';
    exit();
}
?>
<!-- <?php var_dump($_SESSION['card_info'] ?? null); ?> -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<div class="cart-container">
    <div class="cart-left">
        <h1 class="cart-title">Giỏ hàng của bạn</h1>
        <?php if (!empty($error_checkout)): ?>
            <div style="color: red; font-weight: bold; margin: 10px 0; text-align: center;">
                <?php echo $error_checkout; ?>
            </div>
        <?php endif; ?>
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
                        <a href="/WEB_2/products/detail/<?php echo urlencode($item['id_product']); ?>">
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
                                <input type="number" id="quantity-<?php echo $item['id_product']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" readonly style="background:#f7f7f7;pointer-events:none;">
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
            <a href="/WEB_2/products/tatcasanpham" class="continue-shopping">← Tiếp tục xem sản phẩm</a>
        </div>
        <div class="line"></div>
        <?php if (count($cart_items) > 0): ?>
        <form method="POST" action="">
            <input type="hidden" name="action" value="clear">
            <button type="submit" class="clear-cart">Xóa tất cả</button>
        </form>
        <?php endif; ?>
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
            <input type="radio" id="standard" name="shipping" value="standard" <?php if ($selected_ship === 'standard') echo 'checked'; ?>>
            <label for="standard">Chuyển phát thường: 40.000 ₫</label><br>
            <input type="radio" id="express" name="shipping" value="express" <?php if ($selected_ship === 'express') echo 'checked'; ?>>
            <label for="express">Hỏa tốc: 65.000 ₫</label><br>
        </div>

        <div class="shipping-address">
            <strong>Địa chỉ giao hàng:</strong>
            <span>
                <?php if ($default_address): ?>
                    <?php echo htmlspecialchars($default_address['recive_name']); ?><br>
                    <?php echo htmlspecialchars($default_address['phone']); ?><br>
                    <?php echo htmlspecialchars($default_address['address']); ?>
                <?php else: ?>
                    Chưa có địa chỉ
                <?php endif; ?>
            </span>
            <button type="button" id="change-address-btn">Đổi địa chỉ</button>
        </div>

        <div class="payment-method">
            <h4>Chọn hình thức thanh toán</h4>
            <div class="payment-options">
                <input type="radio" id="cashOnDelivery" name="payment" value="cash" <?php if ($selected_payment === 'cash') echo 'checked'; ?>>
                <label for="cashOnDelivery">Thanh toán khi nhận hàng</label><br>
                <input type="radio" id="creditCard" name="payment" value="card" <?php if ($selected_payment === 'card') echo 'checked'; ?>>
                <label for="creditCard">Thanh toán bằng thẻ Visa/MasterCard</label><br>
                <?php if (!empty($_SESSION['card_info'])): ?>
                    <div id="card-info-box" class="card-info-box" style="margin:10px 0; padding:10px; border:1px solid #ccc; border-radius:6px;">
                        <strong>Thông tin thẻ đã nhập:</strong><br>
                        Tên chủ thẻ: <?php echo htmlspecialchars($_SESSION['card_info']['name']); ?><br>
                        Số thẻ: **** **** **** <?php echo substr($_SESSION['card_info']['number'], -4); ?><br>
                        Hết hạn: <?php echo htmlspecialchars($_SESSION['card_info']['date']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <button id="confirm-card-btn" style="display:none;" onclick="window.location.href='/WEB_2/cart/card'">
                <?php echo !empty($_SESSION['card_info']) ? 'Chỉnh thông tin thẻ' : 'Xác nhận thanh toán thẻ'; ?>
            </button>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="clear_card_info" value="1">
                <button type="submit" id="clear-card-info-btn" style="margin-left:10px;">Xóa thông tin thẻ</button>
            </form>
        </div>

        <div class="line"></div>

        <div class="total">
            <p>Tổng</p>
            <p id="cart-total-display"><?php echo number_format($total_with_shipping, 0, ',', '.'); ?> ₫</p>
        </div>

        <!-- <div class="discount-code">
            <h4>Mã ưu đãi</h4>
            <div class="textdiscotainer">
                <input type="text" placeholder="Nhập mã ưu đãi">
                <button>Áp dụng</button>
            </div>
        </div> -->

        <div class="line"></div>
        <form method="POST" action="">
            <input type="hidden" name="action" value="checkout">
            <input type="hidden" id="payment_method_input" name="payment_method" value="<?php echo $selected_payment; ?>">
            <input type="hidden" id="ship_method_input" name="ship_method" value="<?php echo $selected_ship; ?>">
            <button class="checkout" type="submit">Đặt hàng</button>
        </form>
    </div>
</div>

<!-- Modal chọn địa chỉ -->
<div id="address-list-modal" style="display:none; background:rgba(0,0,0,0.2); position:fixed; top:0; left:0; width:100vw; height:100vh; z-index:1000;">
    <div style="background:#fff; margin:100px auto; padding:20px; max-width:400px; border-radius:8px;">
        <form method="POST" action="">
            <input type="hidden" name="action" value="change_address">
            <ul style="list-style:none; padding:0;">
                <?php foreach ($all_addresses as $addr): ?>
                    <li style="margin-bottom:10px;">
                        <label>
                            <input type="radio" name="address_id" value="<?php echo $addr['id_address']; ?>"
                                <?php if ($default_address && $addr['id_address'] == $default_address['id_address']) echo 'checked'; ?>>
                            <strong><?php echo htmlspecialchars($addr['recive_name']); ?></strong><br>
                            <?php echo htmlspecialchars($addr['phone']); ?><br>
                            <?php echo htmlspecialchars($addr['address']); ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button type="submit">Xác nhận</button>
            <button type="button" id="close-address-list">Hủy</button>
            <button type="button" id="add-new-address-btn" style="margin-top:10px; float:right;">Thêm địa chỉ mới</button>
        </form>
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

    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN').format(amount) + ' ₫';
    }
    var subtotal = <?php echo $total; ?>;
    var shippingRadios = document.querySelectorAll('input[name="shipping"]');
    shippingRadios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            var shippingMethod = document.querySelector('input[name="shipping"]:checked').value;
            var shipping = (shippingMethod === 'express') ? 65000 : 40000;
            var totalWithShipping = subtotal + shipping;
            document.getElementById('cart-total-display').textContent = formatCurrency(totalWithShipping);
        });
    });

    // Khi load lại trang, cập nhật tổng tiền đúng phương thức ship
    var checkedShip = document.querySelector('input[name="shipping"]:checked');
    if (checkedShip) {
        var shipping = (checkedShip.value === 'express') ? 65000 : 40000;
        var totalWithShipping = subtotal + shipping;
        document.getElementById('cart-total-display').textContent = formatCurrency(totalWithShipping);
    }

    var btn = document.getElementById('change-address-btn');
    var modal = document.getElementById('address-list-modal');
    var closeBtn = document.getElementById('close-address-list');
    if (btn && modal) {
        btn.onclick = function() { modal.style.display = 'block'; }
    }
    if (closeBtn && modal) {
        closeBtn.onclick = function() { modal.style.display = 'none'; }
    }

    var cardRadio = document.getElementById('creditCard');
    var cashRadio = document.getElementById('cashOnDelivery');
    var cardInfoBox = document.getElementById('card-info-box');
    var confirmBtn = document.getElementById('confirm-card-btn');
    var clearCardBtn = document.getElementById('clear-card-info-btn');

    function toggleConfirmBtnAndCardInfo() {
        if (cardRadio.checked) {
            confirmBtn.style.display = 'block';
            if (cardInfoBox) cardInfoBox.style.display = 'block';
            if (clearCardBtn) clearCardBtn.style.display = 'inline-block';
        } else {
            confirmBtn.style.display = 'none';
            if (cardInfoBox) cardInfoBox.style.display = 'none';
            if (clearCardBtn) clearCardBtn.style.display = 'none';
        }
    }

    cardRadio.addEventListener('change', toggleConfirmBtnAndCardInfo);
    cashRadio.addEventListener('change', toggleConfirmBtnAndCardInfo);
    toggleConfirmBtnAndCardInfo();

    var addNewAddressBtn = document.getElementById('add-new-address-btn');
    if (addNewAddressBtn) {
        addNewAddressBtn.onclick = function() {
            window.location.href = '/WEB_2/address';
        };
    }

    var paymentRadios = document.querySelectorAll('input[name="payment"]');
    var paymentInput = document.getElementById('payment_method_input');
    paymentRadios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            paymentInput.value = this.value;
            // Gửi AJAX lưu vào session
            fetch(window.location.pathname, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'payment_method=' + this.value
            });
        });
    });

    var shipRadios = document.querySelectorAll('input[name="shipping"]');
    var shipInput = document.getElementById('ship_method_input');
    shipRadios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            var method = this.value; // 'standard' hoặc 'express'
            shipInput.value = method;
            // Gửi AJAX lưu vào session
            fetch(window.location.pathname, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'ship_method=' + method
            });
        });
    });

    // Khi load lại trang, cập nhật ship_method_input cho đúng
    var checkedShip = document.querySelector('input[name="shipping"]:checked');
    if (checkedShip && shipInput) {
        shipInput.value = checkedShip.value;
    }
});
</script>

<!-- Hiển thị thông báo lỗi nếu có -->
<?php if (!empty($error_checkout)): ?>
    <div style="color: red; font-weight: bold; margin: 10px 0; text-align: center;">
        <?php echo $error_checkout; ?>
    </div>
<?php endif; ?>
</body>
</html>
