<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        include_once 'models/admin/accountModel.php';
        include_once 'views/admin/accounts/account.php';
        break;
    case 'add':
        include_once 'models/admin/accountModel.php';
        include_once 'views/admin/accounts/account_add.php';
        break;
    case 'addAccount':
        include_once 'models/admin/accountModel.php';
        break;
    case 'edit':
        include_once 'models/admin/accountModel.php';
        include_once 'views/admin/accounts/account_edit.php';
        break;
    case 'update':
        include_once 'models/admin/accountModel.php';
        break;
    case 'destroy':
        include_once 'models/admin/accountModel.php';
        header('Location:index.php?controller=account');
        break;
}
