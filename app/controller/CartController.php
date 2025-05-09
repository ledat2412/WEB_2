<?php
session_start();
require_once '../model/Cart.php';
require_once '../model/Product.php';

class CartController {
    private $cartModel;
    private $productModel;

    public function __construct() {
        $this->cartModel   = new Cart();
        $this->productModel = new Product();
    }

    // Hiển thị giỏ hàng người dùng
    public function viewCart($id_user) {
        $cartItems = $this->cartModel->getCartByUser($id_user);
        foreach ($cartItems as &$item) {
            $item['total_price'] = $item['price'] * $item['quantity'];
        }
        return $cartItems;
    }

    // Thêm sản phẩm vào giỏ (với kiểm tra tồn kho)
    public function addItem($id_user, $id_product, $quantity) {
        // 1. Kiểm tra sản phẩm tồn tại
        $product = $this->productModel->getProduct($id_product);
        if (!$product) {
            throw new Exception('Sản phẩm không tồn tại');
        }

        // 2. Kiểm tra số lượng hợp lệ và tồn kho
        if ($quantity < 1) {
            throw new Exception('Số lượng phải lớn hơn 0');
        }
        if ($quantity > $product['stock']) {
            throw new Exception('Số lượng vượt quá tồn kho');
        }

        // 3. Kiểm tra xem đã có trong giỏ chưa
        $cartItem = $this->cartModel->checkCartItem($id_user, $id_product);
        if ($cartItem) {
            // Cộng dồn và kiểm tra tồn kho
            $newQty = $cartItem[0]['quantity'] + $quantity;
            if ($newQty > $product['stock']) {
                throw new Exception('Số lượng vượt quá tồn kho');
            }
            return $this->cartModel->updateQuantityByUserAndProduct($id_user, $id_product, $newQty);
        } else {
            // Thêm mới
            return $this->cartModel->addToCart($id_user, $id_product, $quantity);
        }
    }

    // Cập nhật số lượng (AJAX)
    public function updateQuantity($id_user, $id_product, $quantity) {
        // Kiểm tra nếu sản phẩm có trong giỏ hàng
        $existing_cart_item = $this->cartModel->getCartItem($id_user, $id_product);
        if ($existing_cart_item) {
            // Cập nhật số lượng sản phẩm
            $this->cartModel->updateQuantityByUserAndProduct($id_user, $id_product, $quantity);

            // Tính lại tổng tiền giỏ hàng
            $updatedCart = $this->cartModel->getCartByUser($id_user);
            $total = 0;
            foreach ($updatedCart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Trả về kết quả JSON (tổng tiền mới)
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'total' => $total]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không có trong giỏ hàng']);
        }
    }

    // Xóa 1 sản phẩm khỏi giỏ
    public function removeFromCart($id_cart) {
        return $this->cartModel->deleteCartItem($id_cart);
    }

    // Xóa toàn bộ giỏ
    public function clearCart($id_user) {
        return $this->cartModel->clearCart($id_user);
    }
}
?>
