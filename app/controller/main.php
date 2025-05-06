<?php
session_start();
ob_start();

// Nếu không có action, xử lý các act khác (home, login, register, ...)
if (!isset($_GET['act']) || ($_GET['act'] !== 'login' && $_GET['act'] !== 'register')) {
    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/header.php";
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
            break;
        case 'login':
            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/log/signin.php";
            break;
        case 'register':
            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/log/signup.php";
            break;
        case 'information':
            if (isset($_GET['skibidiyetyet'])) {

                if (!isset($_SESSION['user_id'])) {
                    header('Location: /login.php');
                    exit();
                }

                $user_id = $_SESSION['user_id'];
                $username = $_SESSION['username'];

                // Bọc hai phần vào một container flex
                echo '<div class="container">';
                echo '<link rel="stylesheet" href="/WEB_2/public/assets/css/infor_sidebar.css">';
                include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/infor_sidebar.php";
                switch ($_GET['skibidiyetyet']) {
                    case 'user_tier':
                        require_once __DIR__ . '/../model/usertier.php';
                        $tiers = $tiers ?? []; // Lấy mảng $tiers từ model nếu chưa có
                        if (!isset($_SESSION['user_id'])) {
                            header('Location: /login.php');
                            exit();
                        }

                        $user_id = $_SESSION['user_id'] ?? 0;
                        $username = $_SESSION['username'] ?? 'Khách';

                        $userTierModel = new UserTier();

                        // GIÁ TRỊ THỤC TẾ
                        // $tierInfo = $userTierModel->getUserTierInfo($user_id);
                        // $total_spent = $tierInfo['total_spent'];
                        // $rank = $tierInfo['rank'];
                        // GIÁ TRỊ GIẢ LẬP
                        $total_spent = 000000;
                        if ($total_spent < 1000000) {
                            $rank = 'Not a member';
                        } elseif ($total_spent < 5000000) {
                            $rank = 'Bronze';
                        } elseif ($total_spent < 9000000) {
                            $rank = 'Silver';
                        } elseif ($total_spent < 15000000) {
                            $rank = 'Platinum';
                        } elseif ($total_spent >= 20000000) {
                            $rank = 'Diamond';
                        } else {
                            $rank = 'Platinum';
                        }

                        // Nếu muốn dùng giá trị thực tế, hãy comment đoạn trên và bỏ comment đoạn dưới:
                        // $tierInfo = $userTierModel->getUserTierInfo($user_id);
                        // $total_spent = $tierInfo['total_spent'];
                        // $rank = $tierInfo['rank'];

                        foreach ($tiers as $tier) {
                            if ($tier['name'] === $rank) {
                                $rankColor = $tier['color'];
                                break;
                            }
                        }
                        include __DIR__ . '/../view/infor/user_tier.php';
                        break;
                    case 'addresses':
                        require_once '../model/users.php';
                        require_once '../model/addresses.php';

                        // Kiểm tra đăng nhập
                        if (!isset($_SESSION['user_id'])) {
                            header('Location: /login.php');
                            exit();
                        }

                        $user_id = $_SESSION['user_id'] ?? 0;
                        $username = $_SESSION['username'] ?? 'Khách';

                        // Lấy danh sách địa chỉ
                        $addressModel = new Addresses();
                        $addresses = $addressModel->getAddressesByUser($user_id);
                        include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/addresses.php";
                        break;
                    case 'order':
                        require_once '../model/orders.php';
                        include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/orders.php";
                        break;
                    case 'notification':
                        include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/notification.php";
                        break;
                    default:
                        include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/user_tier.php";
                        break;
                }
                echo '</div>';
                echo '</div>';
            } else {
                include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/user_tier.php";
            }
            break;
        case 'products':
            // Xử lý variant dạng chuỗi (giaychaybo, giaybongro, ...)
            $variant = isset($_GET['variant']) ? $_GET['variant'] : null;
            if ($variant) {
                // Map tên variant sang id nếu cần, ví dụ:
                $variant_map = [
                    'giaychaybo' => 1,
                    'giaybongro' => 2,
                    'giaythoitrang' => 3,
                    'giaycaulong' => 4
                ];
                $variant_id = isset($variant_map[$variant]) ? $variant_map[$variant] : null;
                if ($variant_id) {
                    $_GET['variant'] = $variant_id;
                }
            }
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                switch ($action) {
                    // case 'product_list':
                    case 'product_list':
                        require_once __DIR__ . '/productlist_controller.php';
                        if (isset($_GET['category'])) {
                            switch ($_GET['category']) {
                                case 'giaychaybo':
                                    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/controller/productshow_controller.php?variant=1";
                                    break;
                                case 'giaybongro':
                                    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaybongro.php";
                                    break;
                                case 'giaythoitrang':
                                    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaythoitrang.php";
                                    break;
                                case 'giaycaulong':
                                    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaycaulong.php";
                                    break;
                                default:
                                    // Trang hiển thị tất cả sản phẩm
                                    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/controller/CartController.php";
                                    break;
                            }
                        } else {
                            // Nếu không có category, hiển thị tất cả sản phẩm
                            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/all-products.php";
                        }
                        break;
                    default:
                        require_once __DIR__ . '/productshow_controller.php';
                        break;
                    case 'product_detail':
                        require_once __DIR__ . '/productdetail_controller.php';
                        break;
                }
            } else {
                require_once __DIR__ . '/productshow_controller.php';
            }
            break;
        case 'cart':
            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/cart/cart.php";
            break;
        default:
            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
            break;
    }
} else {
    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
}

// Đảm bảo footer nằm ngoài main-container
if (!isset($_GET['act']) || ($_GET['act'] !== 'login' && $_GET['act'] !== 'register')) {
    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/footer.php";
}
