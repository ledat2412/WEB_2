let lock = {};
// icon lúc này không phải là id 
function toggleIcon(icon) {
    const row = icon.closest('tr'); // Lấy hàng cha
    // array là mảng -> đầu tiên là tạo một mảng để lưu giá trị -> tìm tất cả thẻ tr-infor và đếm số dòng nó ở đâu và lưu vào mảng
    const rowIndex = Array.from(document.querySelectorAll('.tr-row')).indexOf(row); // Tìm chỉ số hàng
     // Khởi tạo trạng thái cho hàng nếu chưa có
    if (lock[rowIndex] === undefined) {
        lock[rowIndex] = true; // Đặt giá trị mặc định là true
    }
    if (lock[rowIndex]) {
        icon.classList.remove("fa-lock");
        icon.classList.add("fa-unlock");
    }
    else {
        icon.classList.remove("fa-unlock");
        icon.classList.add("fa-lock");
    }
    lock[rowIndex] = !lock[rowIndex];
}
