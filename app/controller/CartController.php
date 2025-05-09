<?php
require_once '../model/cart.php';
require_once '../model/product.php'; // Thêm model Product vào để lấy thông tin sản phẩm


class CartController {
    private $cartModel;
    private $productModel;

    public function __construct() {
        $this->cartModel = new Cart();
        $this->productModel = new Product();
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

    // public function viewCart($id_user) {
    //     return $this->cartModel->getCartByUser($id_user);
    // }

    // public function removeFromCart($id_cart) {
    //     return $this->cartModel->deleteCartItem($id_cart);
    // }

    public function updateCartItem($id_cart, $quantity) {
        return $this->cartModel->updateCartItem($id_cart, $quantity);
    }

    // public function clearCart($id_user) {
    //     return $this->cartModel->clearCart($id_user);
    // }

    // public function updateQuantity($id_product, $new_quantity) {
    //     // Kiểm tra và cập nhật số lượng sản phẩm trong giỏ hàng
    //     if ($new_quantity > 0) {
    //         // Cập nhật số lượng trong cơ sở dữ liệu hoặc session
    //     } else {
    //         // Xử lý khi số lượng không hợp lệ
    //     }
    // }

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

    // Cập nhật số lượng theo id_cart (MVC form)
    public function updateQuantityByIdCart($id_cart, $quantity) {
        return $this->cartModel->updateQuantityByIdCart($id_cart, $quantity);
    }
}
?>

