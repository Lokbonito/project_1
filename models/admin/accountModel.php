<?php

function index()
{
    $item_page = 5;
    $current = 1;
    $search_account = "";
    if (isset($_GET['page'])) {
        $current = $_GET['page'];
    }
    if (isset($_POST['search_account'])) {
        $search_account = $_POST['search_account'];
    }
    $offset = ($current - 1) * $item_page;
    include_once 'connect/openConnect.php';
    $sql = "SELECT COUNT(*) FROM account WHERE phonenumber LIKE '%$search_account%' OR email LIKE '%$search_account%'";
    $query = mysqli_query($connect, $sql);
    $numberOfItem = (int)mysqli_fetch_array($query)[0];
    $totalPage = ceil($numberOfItem / $item_page);
    $sql = "SELECT * FROM account WHERE phonenumber LIKE '%$search_account%' OR email LIKE '%$search_account%' LIMIT $item_page OFFSET $offset";
    $account = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['infor'] = $account;
    $array['totalPage'] = $totalPage;
    $array['currentPage'] = $current;
    return $array;
}

function addAccount()
{
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    include_once 'connect/openConnect.php';
    $checkEmailSql = "SELECT * FROM account WHERE email = '$email'";
    $result = mysqli_query($connect, $checkEmailSql);
    $existingAccount = mysqli_fetch_assoc($result);
    if ($existingAccount) {
        echo '<script language="javascript">
        alert("EMAIL EXISTED");
        window.location.href="?controller=account&action=add";
        </script>';
        return;
    } else {
        $sql = "INSERT INTO account (name, address ,phonenumber, email, password, role) VALUES ('$name', '$address', '$phonenumber', '$email', '$password', '$role')";
        mysqli_query($connect, $sql);
    }
    include_once 'connect/closeConnect.php';
    header('Location:index.php?controller=account');
}


function edit()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM account WHERE id = '$id'";
    $accounts = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $accounts;
}

function update()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    include_once 'connect/openConnect.php';
    $checkEmailSql = "SELECT * FROM account WHERE id != $id AND email = '$email'  ";
    $result = mysqli_query($connect, $checkEmailSql);
    $existingAccount = mysqli_fetch_assoc($result);
    if ($existingAccount) {
        echo '<script language="javascript">
        alert("EMAIL EXISTED");
        window.location.href="?controller=account&action=edit&id=' . $id . '"' . '
        </script>';
        return;
    } else {
        $sql = "UPDATE account SET name = '$name', address = '$address',  phonenumber = '$phonenumber', email = '$email', password = '$password', role = '$role' WHERE id = $id";
        mysqli_query($connect, $sql);
    }
    include_once 'connect/closeConnect.php';
    header('Location:index.php?controller=account');
}


function destroy()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "DELETE FROM account WHERE id = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}


switch ($action) {
    case '':
        $array = index();
        break;

    case 'addAccount':
        addAccount();
        break;

    case 'edit':
        $accounts = edit();
        break;

    case 'update':
        update();
        break;

                case 'destroy':
        destroy();
        break;
}
