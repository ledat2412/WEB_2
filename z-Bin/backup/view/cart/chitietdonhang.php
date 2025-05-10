<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="chitietdonhang.css">
    <link rel="stylesheet" href="/web/Web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
</head>
 <!-- chi tiết đơn hàng -->
 <h2 class="product-page-title">Thông tin giao hàng</h2>
        <div class="product-main-content">
            <div class="product-shipping-info">
                <h3>Trần Ngọc Phương Nhi</h3>
                <form action="#" method="post">
                    <div class="product-form-group">
                        <label for="address-shop">Địa chỉ shop</label>
                        <input type="text" id="address" name="address" value="TP.Hồ Chí Minh" disabled>
                    </div>
                    
                    <div class="product-form-group">
                        <label for="name">Họ và Tên</label>
                        <input type="text" id="name" name="name" value="Trần Ngọc Phương Nhi" disabled>
                    </div>
                    
                    <div class="product-form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" value="0968798030" disabled>
                    </div>

                    <div class="product-form-group">
                        <label>Giao hàng</label>
                        <div>
                            <input type="radio" id="giao-hang-tan-noi" name="giao-hang" value="Giao hàng tận nơi" checked>
                            <label for="giao-hang-tan-noi">Giao hàng tận nơi</label>
                        </div>
                        <div>
                            <input type="radio" id="nhan-tai-cua-hang" name="giao-hang" value="Nhận tại cửa hàng">
                            <label for="nhan-tai-cua-hang">Nhận tại cửa hàng</label>
                        </div>
                    </div>
                    
                    <div class="product-form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" name="address" value="24/3 ấp 7 Xã XTT Huyện HM" disabled>
                    </div>
                    
                    <div class="product-form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="thaonhi.77787@gmail.com" disabled>
                    </div>
                    
                    <div class="product-form-group">
                        <label for="district">Quận / Huyện</label>
                        <input type="text" id="district" name="district" value="Huyện Hóc Môn" disabled>
                    </div>
                </form>
            </div>

            <div class="product-order-summary">
                <h2>Tóm tắt đơn hàng</h2>
                <div class="product-item">
                    <img src="https://product.hstatic.net/1000312752/product/abas081-1h__1__fea18077ad00430eb15339a40e383184_grande.jpg" alt="Chi tiết sản phẩm" class="product-image">
                    <div class="product-item-details">
                        <p class="item-name">Tên sản phẩm: Giày thể thao màu vàng</p>
                        <p class="item-quantity">Số lượng: 1</p>
                        <p class="item-price">Giá: 1,699,000đ</p>
                    </div>
                </div>
                    
                <div class="product-discount">
                    <input type="text" placeholder="Nhập mã giảm giá">
                    <button>Sử dụng</button>
                </div>
                <div class="product-total">
                    <hr>
                    <p><strong>Tổng:</strong> 1,699,000đ</p>
                </div>
                
                <div class="product-order-buttons">
                    <a href="/web/shopcart/shopcart.html"><button class="back-button-cart">Quay lại giỏ hàng</button></a>
                    <a href="/web/shopcart/tong.html"><button class="complete-button">Hoàn tất đơn hàng</button></a>
                </div>
            </div>
        </div>
        <script src="/web/script.js"></script>
</html>