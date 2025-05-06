let editingId = null;

function editRow(id) {
    // Nếu đang chỉnh sửa dòng khác thì bỏ chỉnh sửa dòng đó
    if (editingId !== null) {
        cancelEdit(editingId);
    }
    editingId = id;
    const row = document.getElementById('row-' + id);
    // Lấy dữ liệu hiện tại
    const cells = row.querySelectorAll('.display-cell');
    const name = cells[0].innerText.trim();
    const address = cells[1].innerText.trim();
    const phone = cells[2].innerText.trim();
    // Tạo form inline
    row.innerHTML = `
        <form action="/WEB_2/app/controller/addresses.php" method="post" style="display:contents;">
            <input type="hidden" name="id_address" value="${id}">
            <td><input type="text" name="recive_name" value="${name}" required style="width:100%;height:79px;"></td>
            <td><input type="text" name="address" value="${address}" required style="width:100%;height:79px;"></td>
            <td><input type="text" name="phone" value="${phone}" required style="width:100%;height:79px;"></td>
            <td>
                <button class="edit-address-btn" type="submit" name="update_Address" value="update_Address">Cập nhật</button>
                <button class="delete-address-btn" type="button" onclick="cancelEdit(${id})">Hủy</button>
            </td>
        </form>
    `;
}

function cancelEdit(id) {
    // Reload lại trang để trả về trạng thái ban đầu
    window.location.reload();
}

function toggleAddForm() {
    const form = document.getElementById('add-address-wrapper');
    form.classList.toggle('add-address-visible');
}
// Cho phép lăn chuột ngang bằng wheel
document.querySelectorAll('.scroll-x-address').forEach(function (el) {
    el.addEventListener('wheel', function (e) {
        if (e.deltaY !== 0) {
            e.preventDefault();
            el.scrollLeft += e.deltaY;
        }
    });
});