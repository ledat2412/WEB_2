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
        case 'giaychaybo':
            include $_SERVER['DOCUMENT_ROOT'] . "/WEB_2/app/view/product-web/giaychaybo.php";
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
