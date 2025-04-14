

// log in
function login() {
  var name = document.getElementById("user").value;
  var pass = document.getElementById("passer").value;
  if (name == "admin" && pass == "1") {
    // alert("login success");
    window.location.href = "/web/Web-user.html";
    return false;
  } else {
    alert("login failed");
    return false;
  }
}

// che xem password
function checkPassword() {
  var pass = document.getElementById("passer").value;
  if (pass.length < 6) {
    alert("Password must be at least 6 characters");
    return false;
  }
}

function show() {
  var x = document.getElementById("passer");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


function handlePlaceOrder() {
  const successMessage = document.getElementById('successMessage');
  successMessage.style.display = 'block'; // Hiển thị thông báo

  // Sau 2 giây, tự động quay lại màn hình chính
  setTimeout(() => {
    successMessage.style.display = 'none'; // Ẩn thông báo
    window.location.href = '/web/Web-user.html'; // Đường dẫn đến màn hình chính
  }, 1000);
}

function closeSuccessMessage() {
  const successMessage = document.getElementById('successMessage');
  successMessage.style.display = 'none'; // Ẩn thông báo khi nhấn "Đóng"
}

function confirmPayment() {
  // Kiểm tra hình thức thanh toán
  const selectedPayment = document.querySelector('input[name="payment"]:checked').value;

  if (selectedPayment === "cash") {
    alert("Bạn đã chọn thanh toán khi nhận hàng.");
    // Thực hiện logic khi người dùng chọn thanh toán khi nhận hàng
  } else if (selectedPayment === "card") {
    alert("Bạn sẽ được chuyển đến trang thanh toán bằng thẻ.");
    // Chuyển hướng sang trang thanh toán bằng thẻ
    window.location.href = "/web/shopcart/card-payment.html";
  }
}

//   payment



