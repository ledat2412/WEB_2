<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/";
    
    // Tạo thư mục nếu chưa tồn tại
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Xử lý từng file được upload
    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
        $file_name = $_FILES["images"]["name"][$key];
        $file_tmp = $_FILES["images"]["tmp_name"][$key];
        $file_type = $_FILES["images"]["type"][$key];
        $file_error = $_FILES["images"]["error"][$key];

        // Kiểm tra lỗi
        if ($file_error === 0) {
            // Kiểm tra loại file
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (in_array($file_type, $allowed_types)) {
                // Tạo tên file mới để tránh trùng lặp
                $new_file_name = uniqid() . '_' . $file_name;
                $upload_path = $uploadDir . $new_file_name;

                // Upload file
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    echo "File $file_name đã được upload thành công.<br>";
                } else {
                    echo "Lỗi khi upload file $file_name.<br>";
                }
            } else {
                echo "File $file_name không phải là ảnh hợp lệ.<br>";
            }
        } else {
            echo "Lỗi khi upload file $file_name.<br>";
        }
    }
}

// Chuyển hướng về trang chính
header("Location: productshow.php");
exit();
?> 