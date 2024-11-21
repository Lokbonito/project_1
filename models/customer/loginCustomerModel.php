<?php

function loginAccount()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM account WHERE email = ? AND password = ? AND role = 1";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    include_once 'connect/closeConnect.php';

    if ($row == 0) {
        return 0;
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_role'] = $row['role'];
        return 1;
    }
}

function signupAccount()
{
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    include_once 'connect/openConnect.php';
    $checkEmailSql = "SELECT * FROM account WHERE email = '$email'";
    $result = mysqli_query($connect, $checkEmailSql);
    $existingAccount = mysqli_fetch_assoc($result);
    if ($existingAccount) {
        echo '<script language="javascript">
        alert("EMAIL EXISTED");
        window.location.href="?controller=customer&action=signup";
        </script>';
        return;
    } else {
        $sql = "INSERT INTO account (name, address ,phonenumber, email, password, role) VALUES ('$name', '$address', '$phonenumber', '$email', '$password', 1)";
        mysqli_query($connect, $sql);
    }
    include_once 'connect/closeConnect.php';
    header('Location:index.php?controller=customer');
}



switch ($action) {

    case 'login':
        $check = loginAccount();
        break;

    case 'signupSuccess':
        signupAccount();
        break;

    case 'logout':
        session_unset();
        session_destroy();
        break;
}
