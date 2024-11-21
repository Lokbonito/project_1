<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        include_once 'models/customer/loginCustomerModel.php';
        include_once 'views/customer/login.php';
        break;

    case "login":
        include_once 'models/customer/loginCustomerModel.php';
        if ($check == 0) {
            echo '<script language="javascript">
                alert("Email or password incorrect");
                window.location.href="index.php?controller=customer";
                </script>';
        } elseif ($check == 1) {
            header('Location:index.php?controller=home');
        }
        break;

    case 'signup':
        include_once 'models/customer/loginCustomerModel.php';
        include_once 'views/customer/signup.php';
        break;

    case 'signupSuccess':
        include_once 'models/customer/loginCustomerModel.php';
        header('location:index.php?controller=customer');
        break;

    case 'logout':
        include_once 'models/customer/loginCustomerModel.php';
        header('Location:index.php?controller=customer');
        break;
}
