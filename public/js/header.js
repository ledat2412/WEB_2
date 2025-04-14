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