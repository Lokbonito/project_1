<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case '':
        include_once 'models/admin/orderModel.php';
        include_once 'views/admin/orders/order.php';
        break;
    case 'add':
        include_once 'models/admin/orderModel.php';
        include_once 'views/admin/orders/order_add.php';
        break;
    case 'addProduct':
        include_once 'models/admin/orderModel.php';
        break;
    case 'addCustomer':
        include_once 'models/admin/orderModel.php';
        include_once 'views/admin/orders/order_add_customer.php';
        break;
    case 'store':
        include_once 'models/admin/orderModel.php';
        header('Location:?controller=order');
        break;
    case 'edit':
        include_once 'models/admin/orderModel.php';
        include_once 'views/admin/orders/order_edit.php';
        break;
    case 'update':
        include_once 'models/admin/orderModel.php';
        header('Location:?controller=order');
        break;
    case 'destroy':
        include_once 'models/admin/orderModel.php';
        break;
}
