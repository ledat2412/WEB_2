<?php
require_once '../model/cart.php';

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }

    // Thêm sản phẩm vào giỏ
    public function addToCart($id_user, $id_product, $quantity) {
        // Kiểm tra sản phẩm đã có trong giỏ chưa
        $existItem = $this->cartModel->checkCartItem($id_user, $id_product);

        if (!empty($existItem)) {
            // Nếu đã có thì cập nhật số lượng mới
            $id_cart = $existItem[0]['id_cart'];
            $newQuantity = $existItem[0]['quantity'] + $quantity;
            $this->cartModel->updateCartItem($id_cart, $newQuantity);
        } else {
            // Nếu chưa có thì thêm mới
            $this->cartModel->addToCart($id_user, $id_product, $quantity);
        }
    }

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
