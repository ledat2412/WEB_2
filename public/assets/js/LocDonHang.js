document.getElementById('filter').addEventListener('click', function() {
    // tạo biến để chọn điều kiện tình trạng sản phẩm đó, biến được chọn bởi id typeOfcondition, tìm các condition
    // trong id đó 
    const selecteCondition = document.getElementById('typeOfcondition').value;
    // Lưu tất cả các hàng trong bảng table nhưng không lưu tiêu đề nó lại
    const tableRows = document.querySelectorAll('#content main .table-order tbody tr');

    tableRows.forEach(row => {
        const statusCell = row.cells[4].textContent; // ô Trạng thái

        // Kiểm tra nếu có trạng thái được chọn và so sánh với trạng thái của hàng
        const Matches = selecteCondition ? statusCell.includes(selecteCondition) : true;
        // Hiển thị hàng nếu trạng thái khớp
        if (Matches) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
