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

session_start();
ob_start();

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
        case 'products':
            if (isset($_GET['category'])) {
                switch ($_GET['category']) {
                    case 'giaychaybo':
                        include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product/giaychaybo.php";
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
