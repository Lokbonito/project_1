<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


switch ($action) {
    case '':
        include_once 'models/customer/productDetailModel.php';
        include_once 'views/customer/productDetail.php';
        break;
}
