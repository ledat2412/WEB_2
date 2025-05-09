<?php
require_once '../model/cart.php';
require_once '../model/product.php'; // Thêm model Product vào để lấy thông tin sản phẩm


class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }

    public static function handleAddToCartRequest() {
        if (
            isset($_GET['act']) && $_GET['act'] === 'cart' &&
            isset($_GET['action']) && $_GET['action'] === 'add' &&
            $_SERVER['REQUEST_METHOD'] === 'POST'
        ) {
            $product_id = $_POST['product_id'] ?? '';
            $quantity = max(1, intval($_POST['quantity'] ?? 1));
            $user_id = $_SESSION['user_id'] ?? null;

            if (!$user_id) {
                header("Location: /WEB_2/login");
                exit();
            }

            $cartModel = new Cart();
            $cartModel->addToCart($user_id, $product_id, $quantity);
            $_SESSION['cart_message'] = "Đã thêm vào giỏ hàng!";
            header("Location: /WEB_2/app/controller/main.php?act=products&action=product_detail&id=" . $product_id);
            exit();
        }
    }

    public function viewCart($id_user) {
        return $this->cartModel->getCartByUser($id_user);
    }

    public function removeFromCart($id_cart) {
        return $this->cartModel->deleteCartItem($id_cart);
    }

    public function updateCartItem($id_cart, $quantity) {
        return $this->cartModel->updateCartItem($id_cart, $quantity);
    }

    public function clearCart($id_user) {
        return $this->cartModel->clearCart($id_user);
    }

    public function updateQuantity($id_product, $new_quantity) {
        // Kiểm tra và cập nhật số lượng sản phẩm trong giỏ hàng
        if ($new_quantity > 0) {
            // Cập nhật số lượng trong cơ sở dữ liệu hoặc session
        } else {
            // Xử lý khi số lượng không hợp lệ
        }
    }
}
?>

