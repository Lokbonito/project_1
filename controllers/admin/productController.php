<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        include_once 'models/admin/productModel.php';
        include_once 'views/admin/products/product.php';
        break;

    case 'add':
        include_once 'models/admin/productModel.php';
        include_once 'views/admin/products/product_add.php';
        break;

    case 'addProduct':
        include_once 'models/admin/productModel.php';
        header('Location:index.php?controller=product');
        break;

    case 'edit':
        include_once 'models/admin/productModel.php';
        include_once 'views/admin/products/product_edit.php';
        break;

    case 'update':
        include_once 'models/admin/productModel.php';
        header('Location:index.php?controller=product');
        break;

    case 'destroy':
        include_once 'models/admin/productModel.php';
        break;
}
