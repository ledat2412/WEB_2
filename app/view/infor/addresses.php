<!-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="main-content-infor">
        <h2>Địa chỉ của bạn</h2>
        <?php if ($addresses && count($addresses) > 0): ?>
            <table class="address-table">
                <tr>
                    <th>Tên Người Nhận</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Thao tác</th>
                </tr>
                <?php foreach ($addresses as $address): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($address['recive_name']); ?></td>
                        <td><?php echo htmlspecialchars($address['address']); ?></td>
                        <td><?php echo htmlspecialchars($address['phone']); ?></td>
                        <td>
                            <form action="/WEB_2/app/controller/addresses.php" method="post" style="display:inline;">
                                <input type="hidden" name="id_address" value="<?php echo $address['id_address']; ?>">
                                <button type="button" onclick="showEditForm(<?php echo $address['id_address']; ?>)">Sửa</button>
                                <button type="submit" name="delete_Address" value="delete_Address" onclick="return confirm('Bạn có chắc muốn xóa địa chỉ này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="edit-form-<?php echo $address['id_address']; ?>" style="display:none;">
                        <td colspan="4">
                            <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form">
                                <input type="hidden" name="id_address" value="<?php echo $address['id_address']; ?>">
                                <label for="edit_recive_name_<?php echo $address['id_address']; ?>">Tên Người Nhận:</label>
                                <input type="text" id="edit_recive_name_<?php echo $address['id_address']; ?>" name="recive_name" value="<?php echo htmlspecialchars($address['recive_name']); ?>" required>
                                <br>
                                <label for="edit_address_<?php echo $address['id_address']; ?>">Địa Chỉ:</label>
                                <input type="text" id="edit_address_<?php echo $address['id_address']; ?>" name="address" value="<?php echo htmlspecialchars($address['address']); ?>" required>
                                <br>
                                <label for="edit_phone_<?php echo $address['id_address']; ?>">Số Điện Thoại:</label>
                                <input type="text" id="edit_phone_<?php echo $address['id_address']; ?>" name="phone" value="<?php echo htmlspecialchars($address['phone']); ?>" required>
                                <br>
                                <button type="submit" name="update_Address" value="update_Address">Cập nhật</button>
                                <button type="button" onclick="hideEditForm(<?php echo $address['id_address']; ?>)">Hủy</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form">
                <label for="receiver_name">Tên Người Nhận:</label>
                <input type="text" id="receiver_name" name="receiver_name" required>
                <br>
                <label for="address">Địa Chỉ:</label>
                <input type="text" id="address" name="address" required>
                <br>
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" id="phone" name="phone" required>
                <br>
                <button type="submit" value="add_address" name="add_Address">Thêm địa chỉ</button>
            </form>
        <?php else: ?>
            <p>Bạn chưa có địa chỉ nào.</p>
            <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form">
                <label for="receiver_name">Tên Người Nhận:</label>
                <input type="text" id="receiver_name" name="receiver_name" required>
                <br>
                <label for="address">Địa Chỉ:</label>
                <input type="text" id="address" name="address" required>
                <br>
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" id="phone" name="phone" required>
                <br>
                <button type="submit" value="add_address" name="add_Address">Thêm địa chỉ</button>
            </form>
        <?php endif; ?>
    </div>
    <script>
    function showEditForm(id) {
        document.getElementById('edit-form-' + id).style.display = '';
    }
    function hideEditForm(id) {
        document.getElementById('edit-form-' + id).style.display = 'none';
    }
    </script>
</body>
</html> -->


<!-- <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/addresses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <div class="main-content-infor">
        <h2>Địa chỉ của bạn</h2>
        <div class="address-wrapper">
            <?php if ($addresses && count($addresses) > 0): ?>
                <div class="scrollable-table" style="overflow-x: auto;">
                    <table class="address-table" style="min-width: 600px;">
                        <tr>
                            <th>Tên Người Nhận</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach ($addresses as $address): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($address['recive_name']); ?></td>
                                <td>
                                    <div style="max-width:200px; overflow-x:auto; white-space:nowrap;">
                                        <?php echo htmlspecialchars($address['address']); ?>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($address['phone']); ?></td>
                                <td>
                                    <form action="/WEB_2/app/controller/addresses.php" method="post" style="display:inline;">
                                        <input type="hidden" name="id_address" value="<?php echo $address['id_address']; ?>">
                                        <button type="button" onclick="showEditForm(<?php echo $address['id_address']; ?>)">Sửa</button>
                                        <button type="submit" name="delete_Address" value="delete_Address" onclick="return confirm('Bạn có chắc muốn xóa địa chỉ này?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            <tr id="edit-form-<?php echo $address['id_address']; ?>" style="display:none;">
                                <td colspan="4">
                                    <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form">
                                        <input type="hidden" name="id_address" value="<?php echo $address['id_address']; ?>">
                                        <label for="edit_recive_name_<?php echo $address['id_address']; ?>">Tên Người Nhận:</label>
                                        <input type="text" id="edit_recive_name_<?php echo $address['id_address']; ?>" name="recive_name" value="<?php echo htmlspecialchars($address['recive_name']); ?>" required>
                                        <br>
                                        <label for="edit_address_<?php echo $address['id_address']; ?>">Địa Chỉ:</label>
                                        <input type="text" id="edit_address_<?php echo $address['id_address']; ?>" name="address" value="<?php echo htmlspecialchars($address['address']); ?>" required>
                                        <br>
                                        <label for="edit_phone_<?php echo $address['id_address']; ?>">Số Điện Thoại:</label>
                                        <input type="text" id="edit_phone_<?php echo $address['id_address']; ?>" name="phone" value="<?php echo htmlspecialchars($address['phone']); ?>" required>
                                        <br>
                                        <button type="submit" name="update_Address" value="update_Address">Cập nhật</button>
                                        <button type="button" onclick="hideEditForm(<?php echo $address['id_address']; ?>)">Hủy</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php else: ?>
                <p>Bạn chưa có địa chỉ nào.</p>
            <?php endif; ?>


            <button onclick="toggleAddForm()" type="button">+ Thêm địa chỉ</button>

            <div id="add-address-wrapper" class="add-address-hidden">
                <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form">
                    <label for="receiver_name">Tên Người Nhận:</label>
                    <input type="text" id="receiver_name" name="receiver_name" required>
                    <br>
                    <label for="address">Địa Chỉ:</label>
                    <input type="text" id="address" name="address" required>
                    <br>
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="text" id="phone" name="phone" required>
                    <br>
                    <button type="submit" value="add_address" name="add_Address">accept</button>
                </form>
            </div>
        </div>

        <script>
            function showEditForm(id) {
                document.getElementById('edit-form-' + id).style.display = '';
            }

            function hideEditForm(id) {
                document.getElementById('edit-form-' + id).style.display = 'none';
            }

            function toggleAddForm() {
                const form = document.getElementById('add-address-wrapper');
                form.classList.toggle('add-address-visible');
            }
        </script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WEB_2/public/assets/css/addresses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <div class="main-content-infor">
        <h2>Địa chỉ của bạn</h2>
        <div class="address-wrapper">
            <?php if ($addresses && count($addresses) > 0): ?>
                <div class="scrollable-table" style="overflow-x: auto;">
                    <table class="address-table" style="min-width: 600px;">
                        <tr>
                            <th>Tên Người Nhận</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach ($addresses as $address): ?>
                            <tr id="row-<?php echo $address['id_address']; ?>">
                                <!-- Hiển thị dòng thông tin, sẽ bị thay thế bằng form khi chỉnh sửa -->
                                <td class="display-cell"><?php echo htmlspecialchars($address['recive_name']); ?></td>
                                <td class="display-cell">
                                    <div class="scroll-x-address">
                                        <?php echo htmlspecialchars($address['address']); ?>
                                    </div>
                                </td>
                                <td class="display-cell"><?php echo htmlspecialchars($address['phone']); ?></td>
                                <td class="display-cell">
                                    <button class="edit-address-btn" type="button" onclick="editRow(<?php echo $address['id_address']; ?>)">Sửa</button>
                                    <form action="/WEB_2/app/controller/addresses.php" method="post" style="display:inline;">
                                        <input type="hidden" name="id_address" value="<?php echo $address['id_address']; ?>">
                                        <button class="delete-address-btn" type="submit" name="delete_Address" value="delete_Address" onclick="return confirm('Bạn có chắc muốn xóa địa chỉ này?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php else: ?>
                <p>Bạn chưa có địa chỉ nào.</p>
            <?php endif; ?>

            <button class="edit-address-btn" onclick="toggleAddForm()" type="button">Thêm địa chỉ</button>

            <div id="add-address-wrapper" class="add-address-hidden">
                <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form">
                    <table class="address-table" style="width: 753px; margin-top: 20px;">
                        <tr>
                            <th>Tên Người Nhận</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>Thao tác</th>
                        </tr>
                        <td class="display-cell"><input type="text" id="receiver_name" name="receiver_name" required></td>
                        <td class="display-cell"><input type="text" id="address" name="address" required></td>
                        <td class="display-cell"><input type="text" id="phone" name="phone" required></td>
                        <td class="display-cell"><button class="edit-address-btn" type="submit" value="add_address" name="add_Address">accept</button></td>
                    </table>
                </form>
            </div>
        </div>

        <!-- <script>
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
                        <td><input type="text" name="recive_name" value="${name}" required style="width:100%;height:78px;"></td>
                        <td><input type="text" name="address" value="${address}" required style="width:100%;height:78px;"></td>
                        <td><input type="text" name="phone" value="${phone}" required style="width:100%;height:78px;"></td>
                        <td>
                            <button type="submit" name="update_Address" value="update_Address">Cập nhật</button>
                            <button type="button" onclick="cancelEdit(${id})">Hủy</button>
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
            document.querySelectorAll('.scroll-x-address').forEach(function(el) {
                el.addEventListener('wheel', function(e) {
                    if (e.deltaY !== 0) {
                        e.preventDefault();
                        el.scrollLeft += e.deltaY;
                    }
                });
            });
        </script> -->
        <script src="/WEB_2/public/assets/js/addresses.js"></script>

</body>

</html>