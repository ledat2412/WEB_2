<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân</title>
    <link rel="stylesheet" href="/web/Web.css">
    <link rel="stylesheet" href="thongtincanhan.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
        <!-- infor  -->
        <div class="container">
            <!-- Sidebar -->
            <div class="sidebar">
                <h2>Xin Chào, Phương Nhi Trần Ngọc!</h2>
                <ul>
                    <li><a href="#">Thông Tin Hạng Thành Viên</a></li>
                    <li><a href="/infor/thongtincanhan.html">Thông Tin Cá Nhân</a></li>
                    <li><a href="/infor/lichsu.html">Đơn Hàng</a></li>
                    <li><a href="/infor/diachi.html">Địa Chỉ</a></li>
                    <li><a href="#">Đăng Kí Nhận Thông Báo</a></li>
                    <li><a href="/web/Web.html">Đăng Xuất</a></li>
                </ul>
            </div>

            <!-- Main content -->
            <div class="main-content-infor">
                <h2>Thông Tin Cá Nhân</h2>
                <form action="#" method="post">
                    <div class="form-group-infor">
                        <label for="first-name">Tên</label>
                        <input type="text" id="first-name" name="first-name" value="Phương Nhi">
                    </div>
                    <div class="form-group-infor">
                        <label for="last-name">Họ</label>
                        <input type="text" id="last-name" name="last-name" value="Trần Ngọc">
                    </div>
                    <div class="form-group-infor">
                        <label for="birth-date">Sinh Nhật</label>
                        <input type="date" id="birth-date" name="birth-date">
                    </div>
                    <div class="form-group-infor">
                        <label for="gender">Giới Tính</label>
                        <select id="gender" name="gender">
                            <option value="Nam" selected>Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group-infor">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form-group-infor">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="thaonhi.77787@gmail.com">
                    </div>
                    <button type="submit" class="update-btn">Cập Nhật Thông Tin</button>
                </form>
            </div>
        </div>
        
    <script src="/web/script.js"></script> 
</body>
</html>
