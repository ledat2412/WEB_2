// Danh sách sản phẩm trong giỏ 
let cart = [
  {
    name: "Sản phẩm 1",
    price: 1900000,
    quantity: 1,
    img: "/img/logo_compact.png",
    selected: true
  }
];

// Render lại giỏ hàng
function renderCart() {
  const cartItemsDiv = document.getElementById('cart-items');
  cartItemsDiv.innerHTML = '';
  cart.forEach((item, idx) => {
    cartItemsDiv.innerHTML += `
      <div class="cart-item">
        <input type="checkbox" class="cart-select" onchange="toggleSelect(${idx})" ${item.selected ? 'checked' : ''}>
        <img src="${item.img}" alt="product image">
        <a href="#">${item.name}</a>
        <div class="item-price">
          <p class="price-title">${item.price.toLocaleString('vi-VN')} ₫</p>
          <input class="quantity-title" type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${idx}, this.value)">
          <p class="subtotal-title" id="item-subtotal-${idx}">${(item.price * item.quantity).toLocaleString('vi-VN')} ₫</p>
        </div>
      </div>
    `;
  });
  updateCart();
}// Cập nhật số lượng sản phẩm
function updateQuantity(idx, value) {
  const newQuantity = parseInt(value);
  if (newQuantity > 0) {
    cart[idx].quantity = newQuantity;
    renderCart();
  } else {
    showToast('Số lượng phải lớn hơn 0!');
  }
}

// Chọn hoặc bỏ chọn tất cả sản phẩm
function selectAllCartItems(flag) {
  cart.forEach(item => item.selected = flag);
  renderCart();
}

// Toggle chọn sản phẩm
function toggleSelect(idx) {
  cart[idx].selected = !cart[idx].selected;
  updateCart();
}

// Cập nhật tổng giá trị giỏ hàng chỉ tính sản phẩm được chọn
function updateCart() {
  let subtotal = 0;
  cart.forEach((item, idx) => {
    if (item.selected) {
      subtotal += item.price * item.quantity;
    }
    document.getElementById(`item-subtotal-${idx}`).innerText = (item.price * item.quantity).toLocaleString('vi-VN') + ' ₫';
  });
  document.getElementById('cart-subtotal').innerText = subtotal.toLocaleString('vi-VN') + ' ₫';

  // Lấy phương thức vận chuyển
  const shippingCost = parseInt(document.querySelector('input[name="shipping"]:checked').value);
  const total = subtotal + shippingCost;
  document.getElementById('cart-total').innerText = total.toLocaleString('vi-VN') + ' ₫';
}

// Thêm kiểm tra khi đặt hàng
function checkout() {
  const hasSelected = cart.some(item => item.selected);
  if (!hasSelected) {
    showToast('Vui lòng chọn ít nhất một sản phẩm để đặt hàng!');
    return false;
  }
  // Thực hiện các bước đặt hàng tiếp theo ở đây...
  showToast('Đặt hàng thành công!');
  // ...hoặc chuyển trang, gửi dữ liệu, v.v.
}

// Khởi tạo giỏ hàng khi load trang
window.onload = function() {
  renderCart();
  document.querySelector('.checkout').onclick = checkout;
};

function showToast(message, duration = 2500) {
  // Tìm toast-container, nếu chưa có thì tạo
  let toastContainer = document.getElementById('toast-container');
  if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.id = 'toast-container';
    toastContainer.style.position = 'fixed';
    toastContainer.style.top = '30px';
    toastContainer.style.right = '30px';
    toastContainer.style.zIndex = 9999;
    toastContainer.style.display = 'flex';
    toastContainer.style.flexDirection = 'column';
    toastContainer.style.alignItems = 'flex-end';
    document.body.appendChild(toastContainer);
  }

  // Kiểm tra nếu đã có thông báo cùng nội dung thì chỉ reset progress và timeout
  let existing = Array.from(toastContainer.children).find(
    t => t.classList.contains('toast-notify') && t.dataset.message === message
  );
  if (existing) {
    // Reset progress bar và timeout
    const toastProgress = existing.querySelector('.toast-progress');
    toastProgress.style.animation = 'none';
    void toastProgress.offsetWidth;
    toastProgress.style.animation = `toast-progress-anim ${duration/1000}s linear forwards`;

    if (existing._hideTimeout) clearTimeout(existing._hideTimeout);
    existing._hideTimeout = setTimeout(() => hideToast(existing), duration);
    return;
  }

  // Tạo một toast mới
  const toast = document.createElement('div');
  toast.className = 'toast-notify';
  toast.dataset.message = message;
  toast.style.position = 'relative';
  toast.style.marginTop = '0';
  toast.style.marginBottom = '16px';

  // Nội dung
  const toastMsg = document.createElement('span');
  toastMsg.innerText = message;
  toast.appendChild(toastMsg);

  // Progress bar
  const toastProgress = document.createElement('div');
  toastProgress.className = 'toast-progress';
  toastProgress.style.position = 'absolute';
  toastProgress.style.left = '0';
  toastProgress.style.bottom = '0';
  toastProgress.style.height = '6px';
  toastProgress.style.background = '#28a745';
  toastProgress.style.borderRadius = '0';
  toastProgress.style.width = '100%';
  toastProgress.style.animation = `toast-progress-anim ${duration/1000}s linear forwards`;
  toastProgress.style.boxShadow = '0 2px 8px rgba(40,167,69,0.08)';
  toast.appendChild(toastProgress);

  // Thêm vào container
  toastContainer.appendChild(toast);

  // Animation: đẩy ra
  setTimeout(() => toast.classList.add('toast-show'), 10);

  toast._hideTimeout = setTimeout(() => hideToast(toast), duration);

  function hideToast(toastElem) {
    toastElem.classList.remove('toast-show');
    toastElem.classList.add('toast-hide');
    setTimeout(() => {
      if (toastElem.parentNode) toastElem.parentNode.removeChild(toastElem);
    }, 450);
  }

  toast.onclick = function() {
    clearTimeout(toast._hideTimeout);
    hideToast(toast);
  };
}
