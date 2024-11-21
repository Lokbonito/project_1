<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        include_once 'models/admin/categoryModel.php';
        include_once 'views/admin/categorys/category.php';
        break;
    case 'addCategory':
        include_once 'models/admin/categoryModel.php';
        header('Location:index.php?controller=category');
        break;
    case 'destroyCategory':
        include_once 'models/admin/categoryModel.php';
        header('Location:index.php?controller=category');
        break;
}
