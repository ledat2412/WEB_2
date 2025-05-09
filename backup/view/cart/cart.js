$(document).on('change', '.cart-quantity', function() {
  var id_cart = $(this).data('id-cart');
  var quantity = $(this).val();

  // Gửi yêu cầu cập nhật số lượng
  $.ajax({
      url: '/WEB_2/app/controller/CartController.php', // Đảm bảo đúng URL
      method: 'POST',
      data: {
          action: 'update',
          id_cart: id_cart,
          quantity: quantity
      },
      success: function(response) {
          var data = JSON.parse(response);

          if (data.success) {
              // Cập nhật tổng tiền giỏ hàng
              $('#cart-total').text('Tổng tiền: ' + data.total_with_shipping + ' VNĐ');
              // Cập nhật subtotal cho sản phẩm đã thay đổi
              $('#subtotal-' + id_cart).text('Tạm tính: ' + data.subtotal + ' VNĐ');
          } else {
              alert(data.message);
          }
      }
  });
});
