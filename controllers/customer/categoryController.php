<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        include_once 'models/customer/categoryModel.php';
        include_once 'views/customer/category.php';
        break;
    }