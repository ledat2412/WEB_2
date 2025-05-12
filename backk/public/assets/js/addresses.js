let editingId = null;

function editRow(id) {
    if (editingId !== null) {
        cancelEdit(editingId);
    }
    editingId = id;
    const row = document.getElementById('row-' + id);
    if (!row) return;

    const cells = row.querySelectorAll('.display-cell');
    if (cells.length < 3) return;

    const name = cells[0].innerText.trim();
    const address = cells[1].innerText.trim();
    const phone = cells[2].innerText.trim();

    // Thay từng cell bằng input, giữ layout bảng
    row.innerHTML = `
        <td>
            <input type="text" name="recive_name" value="${name}" required style="width: 100%; height:50px; box-sizing: border-box;">
        </td>
        <td>
            <input type="text" name="address" value="${address}" required style="width: 100%; height:50px; box-sizing: border-box;">
        </td>
        <td>
            <input type="text" name="phone" value="${phone}" required style="width: 100%; height:50px; box-sizing: border-box;">
        </td>
        <td>
            <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form" style="display:inline;">
                <input type="hidden" name="id_address" value="${id}">
                <input type="hidden" name="recive_name" value="${name}">
                <input type="hidden" name="address" value="${address}">
                <input type="hidden" name="phone" value="${phone}">
                <button class="edit-address-btn" type="submit" name="update_Address" value="update_Address" style="margin-right:5px;">Cập nhật</button>
                <button class="delete-address-btn" type="button" onclick="cancelEdit(${id})">Hủy</button>
            </form>
        </td>
    `;

    // Lấy input thực tế để đồng bộ value khi submit
    const inputs = row.querySelectorAll('input[type="text"]');
    const hiddenInputs = row.querySelectorAll('input[type="hidden"]:not([name="id_address"])');
    inputs.forEach((input, idx) => {
        input.addEventListener('input', function () {
            hiddenInputs[idx].value = input.value;
        });
    });
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