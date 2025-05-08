<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị ảnh sản phẩm</title>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 20px 0;
        }
        .image-item {
            position: relative;
            width: 200px;
            margin: 10px;
        }
        .image-item img {
            width: 100%;
            height: auto;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .image-item img:hover {
            transform: scale(1.05);
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
        }
        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
        .debug-info {
            margin: 20px;
            padding: 10px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="debug-info">
        <?php
        // Hiển thị thông tin debug
        $dir = "../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/";
        $absolute_dir = realpath($dir);
        echo "Đường dẫn tương đối: " . $dir . "<br>";
        echo "Đường dẫn tuyệt đối: " . $absolute_dir . "<br>";
        
        if (is_dir($absolute_dir)) {
            echo "Thư mục tồn tại<br>";
            // Liệt kê tất cả các file trong thư mục
            echo "Danh sách tất cả các file trong thư mục:<br>";
            $all_files = scandir($absolute_dir);
            echo "<pre>";
            print_r($all_files);
            echo "</pre>";
        } else {
            echo "Thư mục không tồn tại<br>";
        }
        ?>
    </div>

    <div class="image-container">
        <?php
        if ($absolute_dir) {
            // Lấy danh sách ảnh với đuôi .webp
            $images = glob($absolute_dir . "/*.webp");
            
            if (!empty($images)) {
                foreach ($images as $image) {
                    // Chuyển đổi đường dẫn Windows thành URL path
                    $url_path = str_replace('\\', '/', $image);
                    $url_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $url_path);
                    
                    echo "<div class='image-item'>";
                    echo "<img src='" . $url_path . "' alt='Product Image' onclick='openModal(this.src)'>";
                    // echo "<br>Image path: " . $url_path . "<br>"; o
                    echo "</div>";
                }
            } else {
                echo "<p>Không tìm thấy file .webp trong thư mục.</p>";
                echo "<p>Đường dẫn tìm kiếm: " . $absolute_dir . "/*.webp</p>";
                
                // Kiểm tra tất cả các file trong thư mục
                $all_files = glob($absolute_dir . "/*.*");
                if (!empty($all_files)) {
                    echo "<p>Các file có trong thư mục:</p>";
                    foreach ($all_files as $file) {
                        echo basename($file) . "<br>";
                    }
                }
            }
        }
        ?>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>
        // Mở modal khi click vào ảnh
        function openModal(imgSrc) {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("modalImage");
            modal.style.display = "block";
            modalImg.src = imgSrc;
        }

        // Đóng modal khi click vào nút đóng
        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }

        // Đóng modal khi click bên ngoài ảnh
        window.onclick = function(event) {
            var modal = document.getElementById("imageModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

