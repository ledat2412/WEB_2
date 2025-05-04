<!DOCTYPE html>
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
</html>