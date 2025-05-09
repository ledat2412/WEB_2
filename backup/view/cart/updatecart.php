<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST;  // Sử dụng $_POST thay vì json_decode() vì AJAX gửi data dưới dạng URL encoded

    // Xử lý khi cập nhật số lượng
    if ($input['action'] === 'update') {
        $id_cart = $input['id_cart'];
        $quantity = intval($input['quantity']);

        // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
        if (isset($_SESSION['cart'][$id_cart])) {
            // Cập nhật số lượng sản phẩm
            $_SESSION['cart'][$id_cart]['quantity'] = $quantity;

            // Tính tạm tính của sản phẩm
            $subtotal = $_SESSION['cart'][$id_cart]['price'] * $quantity;

            // Tính tổng tiền của giỏ hàng
            $total = array_sum(array_map(function($item) {
                return $item['price'] * $item['quantity'];
            }, $_SESSION['cart']));

            // Thêm phí vận chuyển
            $shipping_cost = 40000;
            $total_with_shipping = $total + $shipping_cost;

            // Trả về kết quả JSON
            echo json_encode([
                'success' => true,
                'subtotal' => $subtotal,
                'total' => $total,
                'total_with_shipping' => $total_with_shipping
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Phương thức không được hỗ trợ.']);
}
?>
