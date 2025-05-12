document.addEventListener('DOMContentLoaded', function() {
    // Format number to Vietnamese currency
    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN').format(amount) + ' ₫';
    }

    // Update cart item subtotal
    function updateItemSubtotal(itemElement, quantity, price) {
        const subtotal = quantity * price;
        const subtotalElement = itemElement.querySelector('.item-subtotal');
        subtotalElement.textContent = `Tạm tính: ${formatCurrency(subtotal)}`;
        return subtotal;
    }

    // Update cart totals
    function updateCartTotals(subtotal) {
        const shippingCost = 40000; // Standard shipping cost
        const totalWithShipping = subtotal + shippingCost;

        document.getElementById('cart-subtotal-display').textContent = formatCurrency(subtotal);
        document.getElementById('cart-total-display').textContent = formatCurrency(totalWithShipping);
    }

    // Handle quantity input changes
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            const itemElement = this.closest('.cart-item');
            const idProduct = this.dataset.idProduct;
            const idCart = this.dataset.idCart;
            const price = parseFloat(itemElement.querySelector('.item-price').textContent.replace(/[^\d]/g, ''));
            const newQuantity = parseInt(this.value);

            if (newQuantity < 1) {
                alert('Số lượng phải lớn hơn 0');
                this.value = 1;
                return;
            }

            // Update via AJAX
            fetch('/WEB_2/app/view/cart/cart.php', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    action: 'update',
                    id_product: idProduct,
                    id_cart: idCart,
                    quantity: newQuantity
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Update item subtotal
                    const itemSubtotal = updateItemSubtotal(itemElement, newQuantity, price);
                    
                    // Update cart totals
                    updateCartTotals(data.total);
                } else {
                    throw new Error(data.message || 'Cập nhật thất bại');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Có lỗi xảy ra khi cập nhật giỏ hàng');
                // Reset to previous value
                this.value = this.defaultValue;
            });
        });
    });

    // Handle remove item
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            if (!confirm('Bạn có chắc muốn xóa sản phẩm này không?')) return;

            const idCart = this.dataset.id;
            const itemElement = this.closest('.cart-item');

            fetch('/WEB_2/app/view/cart/cart.php', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    action: 'delete',
                    id_cart: idCart
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    itemElement.remove();
                    updateCartTotals(data.total);
                } else {
                    alert('Xóa thất bại: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi xóa sản phẩm');
            });
        });
    });

    // Handle clear cart
    const clearCartButton = document.querySelector('.clear-cart');
    if (clearCartButton) {
        clearCartButton.addEventListener('click', function() {
            if (!confirm('Bạn có chắc muốn xóa tất cả sản phẩm trong giỏ hàng?')) return;

            fetch('/WEB_2/app/view/cart/cart.php', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    action: 'clear'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('cart-items').innerHTML = '';
                    updateCartTotals(0);
                } else {
                    alert('Xóa giỏ hàng thất bại: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi xóa giỏ hàng');
            });
        });
    }
});
