<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["image"])) {
    $image_path = $_POST["image"];
    
    // Kiểm tra file có tồn tại không
    if (file_exists($image_path)) {
        // Xóa file
        if (unlink($image_path)) {
            echo "File đã được xóa thành công.";
        } else {
            echo "Lỗi khi xóa file.";
        }
    } else {
        echo "File không tồn tại.";
    }
}

// Chuyển hướng về trang chính
header("Location: productshow.php");
exit();
?> 