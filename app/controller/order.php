<?php
// OrderController.php
require_once __DIR__ . '/../model/orders.php';
require_once __DIR__ . '/../model/cart.php';



class OrderController {
    private $orderModel;
    private $cartModel;

    public function __construct() {
        $this->orderModel = new Orders();
        $this->cartModel = new Cart();  // Giả sử bạn đã có model Cart
    }

    // Tạo đơn hàng từ giỏ hàng
    public function createOrder($id_user, $id_address) {
        // Kiểm tra xem giỏ hàng có sản phẩm hay không
        $cartItems = $this->cartModel->getCartByUser($id_user);
        if (empty($cartItems)) {
            throw new Exception("Giỏ hàng không có sản phẩm.");
        }

        // Tạo đơn hàng
        $order_id = $this->orderModel->addOrder($id_user, $id_address);

        // Thêm các sản phẩm trong giỏ vào đơn hàng
        foreach ($cartItems as $item) {
            $this->orderModel->addOrderItem($order_id, $item['id_product'], $item['quantity'], $item['price']);
        }

        // Xóa giỏ hàng sau khi tạo đơn hàng
        $this->cartModel->clearCart($id_user);

        return $order_id;  // Trả về ID đơn hàng mới tạo
    }

    // Lấy thông tin đơn hàng của người dùng
    public function getOrderHistory($id_user) {
        return $this->orderModel->getOrdersByUser($id_user);
    }

    // Hiển thị chi tiết đơn hàng
    public function viewOrder($id_order) {
        return $this->orderModel->getOrder($id_order);
    }

    // Hiển thị lịch sử đơn hàng
    public function showOrderHistory($id_user) {
        $orders = $this->getOrderHistory($id_user);
        require_once 'view/order/history.php';  // Truyền dữ liệu vào view
    }
    
    // Hiển thị chi tiết đơn hàng
    public function showOrderDetail($id_order) {
        $order = $this->viewOrder($id_order);
        require_once 'view/order/detail.php';  // Truyền dữ liệu vào view
    }
}
?>
