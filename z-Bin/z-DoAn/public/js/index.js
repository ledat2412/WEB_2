// ================menubar Animation ==================//
function toggleMenu() {
    const menu = document.getElementById('responsiveMenu');
    const overlay = document.getElementById('overlay');
    const body = document.querySelector('body');
    menu.classList.toggle('active');
    overlay.classList.toggle('active');
    body.classList.toggle('no-scroll');
  }

  function toggleSubMenu1() {
    const subMenu = document.getElementById('subMenu1');
    subMenu.classList.toggle('active');
  }

  function toggleSubMenu2() {
    const subMenu = document.getElementById('subMenu2');
    subMenu.classList.toggle('active');
  }

    // Hàm tìm kiếm trong menu
    function searchMenu() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const options = document.querySelectorAll('#suggestions option');
    
        // Kiểm tra và lọc các tùy chọn trong datalist
        options.forEach(option => {
        const optionText = option.value.toLowerCase();
        if (optionText.includes(filter)) {
            option.style.display = ""; // Hiển thị các kết quả khớp
        } else {
            option.style.display = "none"; // Ẩn các kết quả không khớp
        }
        });
    }
    
    // Hàm khi người dùng nhấn Enter
    document.getElementById('searchInput').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
        const input = document.getElementById('searchInput').value;
        const options = document.querySelectorAll('#suggestions option');
        
        // Tìm URL của sản phẩm tương ứng khi nhấn Enter
        options.forEach(option => {
            if (option.value.toLowerCase() === input.toLowerCase()) {
            window.location.href = option.getAttribute('data-url'); // Chuyển hướng đến URL
            }
        });
        }
    });
  
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

function show () {
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



  