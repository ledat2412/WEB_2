<?php
// session_start();
// ob_start();
// include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/view/base/header.php";

// if (isset($_GET['act'])) {
//     $act = $_GET['act'];
//     switch ($act) {
//         case 'home':
//             include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/view/base/home.php";
//             break;
//         case 'login':
//             include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/view/log/signin.php";
//             break;
//         case 'register':
//             include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/view/log/signup.php";
//             break;
//         // case 'logout':
//         //     include "app/view/logout.php";
//         //     break;
//         default:
//            include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/view/base/home.php";
//             break;
//     }
// } else {
//    include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/view/base/home.php";
// }
// include $_SERVER['DOCUMENT_ROOT'] . "/Git/app/view/base/footer.php";

// session_start();
// ob_start();

// if (!isset($_GET['act']) || ($_GET['act'] !== 'login' && $_GET['act'] !== 'register')) {
//     include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/header.php";
// }

// if (isset($_GET['act'])) {
//     $act = $_GET['act'];
//     switch ($act) {
//         case 'home':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
//             break;
//         case 'login':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/log/signin.php";
//             break;
//         case 'register':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/log/signup.php";
//             break;
//         case 'giaychaybo':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product-web/giaychaybo.php";
//             break;
//         case 'cart':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/cart/cart.php";
//             break;
//         default:
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
//             break;
//     }
// } else {
//     include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
// }

// if (!isset($_GET['act']) || ($_GET['act'] !== 'login' && $_GET['act'] !== 'register')) {
//     include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/footer.php";
// }

// session_start();
// ob_start();

// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
//     switch ($action) {
//         case 'product_detail':
//             require_once __DIR__ . '/productdetail_controller.php';
//             break;
//         case 'product_list':
//         default:
//             require_once __DIR__ . '/productshow_controller.php';
//             break;
//     }
//     exit; // Dừng lại, không include các file home/login/register phía dưới nữa
// }

// // Nếu không có action, xử lý các act khác (home, login, register, ...)
// if (!isset($_GET['act']) || ($_GET['act'] !== 'login' && $_GET['act'] !== 'register')) {
//     include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/header.php";
// }

// if (isset($_GET['act'])) {
//     $act = $_GET['act'];
//     switch ($act) {
//         case 'home':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
//             break;
//         case 'login':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/log/signin.php";
//             break;
//         case 'register':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/log/signup.php";
//             break;
//         case 'products':
//             if (isset($_GET['category'])) {
//                 switch ($_GET['category']) {
//                     case 'giaychaybo':
//                         include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaychaybo.php";
//                         break;
//                     case 'giaybongro':
//                         include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaybongro.php";
//                         break;
//                     case 'giaythoitrang':
//                         include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaythoitrang.php";
//                         break;
//                     case 'giaycaulong':
//                         include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaycaulong.php";
//                         break;
//                     default:
//                         // Trang hiển thị tất cả sản phẩm
//                         include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/controller/CartController.php";
//                         break;
//                 }
//             } else {
//                 // Nếu không có category, hiển thị tất cả sản phẩm
//                 include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/all-products.php";
//             }
//         break;
//         case 'cart':
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/cart/cart.php";
//             break;
//         default:
//             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
//             break;
//     }
// } else {
//     include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/home.php";
// }

// if (!isset($_GET['act']) || ($_GET['act'] !== 'login' && $_GET['act'] !== 'register')) {
//     include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/footer.php";
// }


session_start();
ob_start();

// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
//     switch ($action) {
//         case 'product_detail':
//             require_once __DIR__ . '/productdetail_controller.php';
//             break;
//         case 'product_list':
//         default:
//             require_once __DIR__ . '/productshow_controller.php';
//             break;
//     }
//     exit; // Dừng lại, không include các file home/login/register phía dưới nữa
// }

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
        case 'inforamtion':
            if (isset($_GET['skibidiyetyet'])){
                switch ($_GET['skibidiyetyet']){
                    case 'user_tier':
                        require_once __DIR__ . '/../model/UserTier.php';
                        $user_id = $_SESSION['user_id'] ?? 0;
                        $username = $_SESSION['username'] ?? 'Khách';
                        $userTierModel = new UserTier();
                        // $tierInfo = $userTierModel->getUserTierInfo($user_id);
                        // $total_spent = $tierInfo['total_spent'];
                        // $rank = $tierInfo['rank'];
                                    // GIÁ TRỊ GIẢ LẬP
                                    $total_spent = 7000000; 
                                    if ($total_spent < 1000000) {
                                        $rank = 'Chưa là thành viên';
                                    } elseif ($total_spent < 5000000) {
                                        $rank = 'Đồng';
                                    } elseif ($total_spent < 9000000) {
                                        $rank = 'Silver';
                                    } elseif ($total_spent < 15000000) {
                                        $rank = 'Platinum';
                                    } elseif ($total_spent >= 20000000) {
                                        $rank = 'Diamond';
                                    } else {
                                        $rank = 'Platinum';
                                    }
                        include __DIR__ . '/../view/infor/user_tier.php';
                        break;
                    case 'addresses':
                        include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/addresses.php";
                        break;
                    // case 'user_tier':
                    //     include $_SERVER['DOCUMENT_ROOT'] . "";
                    //     break;
                    // case 'user_tier':
                    //     include $_SERVER['DOCUMENT_ROOT'] . "";
                    //     break;
                    default:
                        include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/user_tier.php";
                        break;
                }
            }else{
                include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/infor/user_tier.php";
            }
        case 'products':
            // if (isset($_GET['category'])) {
            //     switch ($_GET['category']) {
            //         case 'giaychaybo':
            //             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaychaybo.php";
            //             break;
            //         case 'giaybongro':
            //             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaybongro.php";
            //             break;
            //         case 'giaythoitrang':
            //             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaythoitrang.php";
            //             break;
            //         case 'giaycaulong':
            //             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaycaulong.php";
            //             break;
            //         default:
            //             // Trang hiển thị tất cả sản phẩm
            //             include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/controller/CartController.php";
            //             break;
            //     }
            // } else {
            //     // Nếu không có category, hiển thị tất cả sản phẩm
            //     include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/all-products.php";
            // }
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                switch ($action) {
                    case 'product_detail':
                        require_once __DIR__ . '/productdetail_controller.php';
                        break;
                    // case 'product_list':
                    default:
                        require_once __DIR__ . '/productshow_controller.php';
                        break;
                }
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

if (!isset($_GET['act']) || ($_GET['act'] !== 'login' && $_GET['act'] !== 'register')) {
    include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/base/footer.php";
}
