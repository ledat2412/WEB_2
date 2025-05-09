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
            <?php
            // Đảm bảo biến $addresses và $addressCount luôn được khai báo
            $addressCount = (isset($addresses) && is_array($addresses)) ? count($addresses) : 0;
            // bảng trên luôn 700px
            $tableWidthStr = '700px';
            // bảng dưới: < 4 địa chỉ thì 680px, >= 4 địa chỉ thì 600px
            $formTableWidth = ($addressCount > 4) ? '755px' : '800px';
            ?>
            <?php if ($addresses && count($addresses) > 0): ?>
                <div class="scrollable-table" style="overflow-x: auto;">
                    <table class="address-table" style="min-width: <?php echo $tableWidthStr; ?>;">
                        <thead>
                            <tr>
                                <th>Tên Người Nhận</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($addresses as $address): ?>
                                <tr id="row-<?php echo $address['id_address']; ?>">
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
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>Bạn chưa có địa chỉ nào.</p>
            <?php endif; ?>

            <button class="edit-address-btn" onclick="toggleAddForm()" type="button">Thêm địa chỉ</button>

            <div id="add-address-wrapper" class="add-address-hidden">
                <div style="overflow-x: auto;">
                    <form action="/WEB_2/app/controller/addresses.php" method="post" class="address-form">
                        <table class="address-table" style="width: <?php echo $formTableWidth; ?>; margin-top: 20px; table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th>Tên Người Nhận</th>
                                    <th>Địa Chỉ</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="display-cell"><input type="text" id="receiver_name" name="receiver_name" required></td>
                                    <td class="display-cell"><input type="text" id="address" name="address" required></td>
                                    <td class="display-cell"><input type="text" id="phone" name="phone" required></td>
                                    <td class="display-cell"><button class="edit-address-btn" type="submit" value="add_address" name="add_Address">accept</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <script src="/WEB_2/public/assets/js/addresses.js"></script>

</body>

</html>