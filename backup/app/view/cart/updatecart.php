<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST;

    // Kiểm tra hành động cập nhật
    if (isset($input['action']) && $input['action'] === 'update') {
        $id_cart = $input['id_cart'] ?? null;
        $quantity = isset($input['quantity']) ? intval($input['quantity']) : null;

        // Kiểm tra dữ liệu hợp lệ
        if ($id_cart === null || $quantity === null || $quantity < 1) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
            exit;
        }

        // Kiểm tra sản phẩm có tồn tại trong giỏ hàng không
        if (isset($_SESSION['cart'][$id_cart])) {
            // Cập nhật số lượng sản phẩm
            $_SESSION['cart'][$id_cart]['quantity'] = $quantity;

            // Tính tạm tính của sản phẩm
            $subtotal = $_SESSION['cart'][$id_cart]['price'] * $quantity;

            // Tính tổng tiền của giỏ hàng
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['quantity'];
            }

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
        echo json_encode(['success' => false, 'message' => 'Hành động không hợp lệ.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Phương thức không được hỗ trợ.']);
}
?>
