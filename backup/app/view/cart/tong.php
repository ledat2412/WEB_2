<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="tong.css">
    <link rel="stylesheet" href="/web/Web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="icon" href="/img/logo_compact.png" type="image/x-icon">
</head>

<!-- Địa chỉ nhận hàng -->
        <div class="shipping-address">
            <h2>Địa Chỉ Nhận Hàng</h2>
            <div class="address-details">
                <p><strong>Phương Nhi</strong> (+84) 968798030</p>
                <p>24/3 ấp 7 xã Xuân Thới Thượng, huyện Hóc Môn, TP. Hồ Chí Minh</p>
            </div>
        </div>

        <!-- Sản phẩm -->
        <div class="product-section">
            
            <div class="product-table">
                <!-- Tiêu đề bảng -->
                <div class="table-header">
                    <span>Sản phẩm</span>
                    <span>Đơn giá</span>
                    <span>Số lượng</span>
                    <span>Thành tiền</span>
                </div>
                <!-- Chi tiết sản phẩm -->
                <div class="table-row">
                    <div class="product-info">
                        <img src="https://product.hstatic.net/1000312752/product/c6c47d44644a09a327edf80f6a71ae5c23d4602dc03b0c190c8a2bb38624078f777ed3_93bc4be9cb0646648370c5f3111d1d08.jpg" 
                             alt="Giày chạy bộ" style="width: 60px; margin-right: 10px;">
                        <p><strong>Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V</strong></p>
                        <p>Phân loại hàng: Giày chạy bộ. Mã SP: ARPU001-6V</p>
                    </div>
                    <span class="price">₫2,444,727</span>
                    <span class="quantity">1</span>
                    <span class="total">₫2,444,727</span>
                </div>
            </div>
        </div>

        <!-- Phương thức thanh toán -->
        <div class="payment-method">
            <h2>Phương Thức Thanh Toán</h2>
            <div class="payment-details">
                <p><strong>Thanh toán khi nhận hàng</strong></p>
                <div class="payment-summary">
                    <div class="summary-item">
                        <span class="label">Tổng tiền hàng:</span>
                        <span class="value">₫2,444,727</span>
                    </div>
                    <div class="summary-item">
                        <span class="label">Tổng phí vận chuyển:</span>
                        <span class="value">₫37,300</span>
                    </div>
                    <div class="summary-item total">
                        <span class="label">Tổng thanh toán:</span>
                        <span class="value">₫2,482,027</span>
                    </div>
                </div>
            </div>
            <!-- Nút "Đặt Hàng" -->
            <button class="place-order-btn" onclick="handlePlaceOrder()">Đặt Hàng</button>

            <!-- Phần thông báo -->
            <div class="success-message" id="successMessage">
            <p>Đặt hàng thành công! Bạn sẽ được quay lại trang chính.</p>
            <button onclick="closeSuccessMessage()">Đóng</button>
            </div>
        </div>
    </div>
    <script src="/web/script.js"></script>
</html>