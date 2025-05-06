<?php
session_start(); 
require_once __DIR__ . '/../model/users.php';
require_once '../model/addresses.php';

class AddressesController {
    private $addressesModel;

    public function __construct() {
        $this->addressesModel = new Addresses();
    }

    public function handleAddAddress() {
        if (isset($_POST['add_Address'])) {
            $username = $_SESSION['username'] ?? null;
            if (!$username) {
                echo 'Lỗi: Bạn cần đăng nhập.';
                exit;
            }

            $usersModel = new Users();
            $user = $usersModel->getUserByUsername($username);

            $id_user = $user['id_users'] ?? $user['id_user'] ?? null;
            if (!$id_user) {
                echo 'Lỗi: Không tìm thấy id_user từ username.';
                exit;
            }

            $recive_name = $_POST['receiver_name'] ?? '';
            $address = $_POST['address'] ?? '';
            $phone = $_POST['phone'] ?? '';

            // Debug: kiểm tra dữ liệu đầu vào
            if (!$recive_name || !$address || !$phone) {
                die('Lỗi: Thiếu dữ liệu từ form');
            }

            $result = $this->addressesModel->addAddress($id_user, $recive_name, $phone, $address);
            if ($result) {
                header('Location: /WEB_2/address');
                exit;
            } else {
                die('Lỗi: Không thêm được vào database');
            }
        }
    }

    public function handleUpdateAddress() {
        if (!isset($addresses)) {
            $addresses = [];
        }
        if (isset($_POST['update_Address'])) {
            $username = $_SESSION['username'] ?? null;
            if (!$username) {
                echo 'Lỗi: Bạn cần đăng nhập.';
                exit;
            }

            $usersModel = new Users();
            $user = $usersModel->getUserByUsername($username);
            $id_user = $user['id_users'] ?? $user['id_user'] ?? null;
            if (!$id_user) {
                echo 'Lỗi: Không tìm thấy id_user từ username.';
                exit;
            }

            $id_address = $_POST['id_address'] ?? null;
            $recive_name = $_POST['recive_name'] ?? '';
            $address = $_POST['address'] ?? '';
            $phone = $_POST['phone'] ?? '';

            if (!$id_address || !$recive_name || !$address || !$phone) {
                die('Lỗi: Thiếu dữ liệu cập nhật');
            }

            $result = $this->addressesModel->updateAddress($id_address, $id_user, $recive_name, $phone, $address);
            if ($result) {
                header('Location: /WEB_2/address');
                exit;
            } else {
                die('Lỗi: Không cập nhật được địa chỉ');
            }
        }
    }

    public function handleDeleteAddress() {
        if (isset($_POST['delete_Address'])) {
            $username = $_SESSION['username'] ?? null;
            if (!$username) {
                echo 'Lỗi: Bạn cần đăng nhập.';
                exit;
            }

            $usersModel = new Users();
            $user = $usersModel->getUserByUsername($username);
            $id_user = $user['id_users'] ?? $user['id_user'] ?? null;
            if (!$id_user) {
                echo 'Lỗi: Không tìm thấy id_user từ username.';
                exit;
            }

            $id_address = $_POST['id_address'] ?? null;
            if (!$id_address) {
                die('Lỗi: Thiếu id_address để xóa');
            }

            $result = $this->addressesModel->deleteAddress($id_address, $id_user);
            if ($result) {
                header('Location: /WEB_2/address');
                exit;
            } else {
                die('Lỗi: Không xóa được địa chỉ');
            }
        }
    }
}

$controller = new AddressesController();
$controller->handleAddAddress();
$controller->handleUpdateAddress();
$controller->handleDeleteAddress();
