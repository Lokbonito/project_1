<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '': {
            include_once 'models/customer/cartModel.php';
            include_once 'views/customer/cart.php';
        }
        break;
    case 'addToCart': {
            include_once 'models/customer/cartModel.php';
        }
        break;
    case 'destroy': {
            include_once 'models/customer/cartModel.php';
        }
        break;
    case 'changeAmount': {
            include_once 'models/customer/cartModel.php';
        }
        break;
    case 'store': {
            include_once 'models/customer/cartModel.php';
        }
        break;
}
