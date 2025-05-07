<?php
require_once '../model/cart.php';

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new cart();
    }

    // Xử lý request thêm vào giỏ hàng (gọi từ view hoặc main)
    public static function handleAddToCartRequest() {
        if (
            isset($_GET['act']) && $_GET['act'] === 'cart'
            && isset($_GET['action']) && $_GET['action'] === 'add'
            && $_SERVER['REQUEST_METHOD'] === 'POST'
        ) {
            $product_id = $_POST['product_id'] ?? '';
            $quantity = max(1, intval($_POST['quantity'] ?? 1));
            $user_id = $_SESSION['user_id'] ?? null;

            if (!$user_id) {
                header("Location: /WEB_2/login");
                exit();
            }

            $cartController = new cart();
            $cartController->addToCart($user_id, $product_id, $quantity);

            $_SESSION['cart_message'] = "Đã thêm vào giỏ hàng!";

            header("Location: /WEB_2/app/controller/main.php?act=products&action=product_detail&id=" . $product_id);
            exit();
        }
    }

    // Thêm sản phẩm vào giỏ
    // public function addToCart($id_user, $id_product, $quantity) {
    //     // Kiểm tra sản phẩm đã có trong giỏ chưa
    //     $existItem = $this->cartModel->checkCartItem($id_user, $id_product);

    //     if (!empty($existItem)) {
    //         // Nếu đã có thì cập nhật số lượng mới
    //         $id_cart = $existItem[0]['id_cart'];
    //         $newQuantity = $existItem[0]['quantity'] + $quantity;
    //         $this->cartModel->updateCartItem($id_cart, $newQuantity);
    //     } else {
    //         // Nếu chưa có thì thêm mới
    //         $this->cartModel->addToCart($id_user, $id_product, $quantity);
    //     }
    // }


    // Lấy tất cả sản phẩm trong giỏ của user
    public function viewCart($id_user) {
        return $this->cartModel->getCartByUser($id_user);
    }

    // Kiểm tra xem giỏ hàng có sản phẩm hay không
    public function checkIfCartHasItems($id_user) {
        $cartItems = $this->cartModel->getCartByUser($id_user);
        return count($cartItems) > 0;
    }

    // Xóa 1 sản phẩm khỏi giỏ
    public function removeFromCart($id_cart) {
        return $this->cartModel->deleteCartItem($id_cart);
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateCartItem($id_cart, $quantity) {
        return $this->cartModel->updateCartItem($id_cart, $quantity);
    }

    // Xóa toàn bộ giỏ hàng của user
    public function clearCart($id_user) {
        return $this->cartModel->clearCart($id_user);
    }
}
?>
