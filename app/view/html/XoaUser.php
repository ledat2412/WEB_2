<?php 
include_once "../../../app/model/database.php";
$db = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['del_id'])) {
    $id = intval($_POST['del_id']);

    // Lấy tất cả id_order của user này
    $orders = $db->getData("SELECT id_order FROM orders WHERE id_user = $id");
    if (!empty($orders)) {
        foreach ($orders as $order) {
            $order_id = intval($order['id_order']);
            // Xóa order_items trước (tránh lỗi khóa ngoại)
            $db->handle("DELETE FROM order_items WHERE id_order = $order_id");
        }
    }

    // Xóa các bản ghi liên quan trong bảng cart trước (tránh lỗi khóa ngoại)
    $db->handle("DELETE FROM cart WHERE id_user = $id");

    // Xóa các bản ghi liên quan trong bảng orders trước (nếu có)
    $db->handle("DELETE FROM orders WHERE id_user = $id");

    // Xóa các bản ghi liên quan trong bảng addresses sau khi đã xóa orders
    $db->handle("DELETE FROM addresses WHERE id_user = $id");

    // Sau đó mới xóa user
    $db->handle("DELETE FROM users WHERE id_users = $id");

    // Chuyển hướng về trang quản lý người dùng
    header("Location: /WEB_2/admin/users");
    exit();
}
?>