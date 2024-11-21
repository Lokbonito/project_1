<?php
session_start();
define("PENDING", 1);
define("DELIVERING", 2);
define("COMPLETED", 3);
define("CANCELED", 4);
$controller = '';
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
}

switch ($controller) {
    case 'admin':
        include_once 'controllers/admin/adminController.php';
        break;
    case 'dashboard':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 2) {
            include_once 'views/admin/dashboard.php';
        } else {
            header('location:index.php?controller=admin');
        }
        break;
    case 'product':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 2) {
            include_once 'controllers/admin/productController.php';
        } else {
            header('location:index.php?controller=admin');
        }
        break;
    case 'account':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 2) {
            include_once 'controllers/admin/accountController.php';
        } else {
            header('location:index.php?controller=admin');
        }
        break;
    case 'category':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 2) {
            include_once 'controllers/admin/categoryController.php';
        } else {
            header('location:index.php?controller=admin');
        }
        break;
    case 'room':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 2) {
            include_once 'controllers/admin/roomController.php';
        } else {
            header('location:index.php?controller=admin');
        }
        break;
    case 'order':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 2) {
            include_once 'controllers/admin/orderController.php';
        } else {
            header('location:index.php?controller=admin');
        }
        break;
    case 'customer':
        include_once "controllers/customer/customerController.php";
        break;
    case 'home':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 1) {
            include_once "controllers/customer/homeController.php";
        } else {
            header('location:index.php?controller=customer');
        }
        break;
    case 'productDetail':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 1) {
            include_once "controllers/customer/productDetailController.php";
        } else {
            header('location:index.php?controller=customer');
        }
        break;
    case 'cart':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 1) {
            include_once "controllers/customer/cartController.php";
        } else {
            header('location:index.php?controller=customer');
        }
        break;
    case 'orderBrowsing':
        if (isset($_SESSION['email']) && $_SESSION['user_role'] == 1) {
            include_once "controllers/customer/orderBrowsingController.php";
        } else {
            header('location:index.php?controller=customer');
        }
        break;
}
