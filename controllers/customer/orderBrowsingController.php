<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


switch ($action) {
    case '':
        include_once 'models/customer/orderBrowsingModel.php';
        include_once 'views/customer/orderBrowsing.php';
        break;
    case 'cancel':
        include_once 'models/customer/orderBrowsingModel.php';
        header('Location:?controller=orderBrowsing');
        break;
}
