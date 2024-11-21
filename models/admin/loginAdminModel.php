<?php

function loginAccount()
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  include_once 'connect/openConnect.php';
  $sql = "SELECT * FROM account WHERE email = ? AND password = ? AND role = 2";
  $stmt = mysqli_prepare($connect, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $email, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  include_once 'connect/closeConnect.php';

  if (!$row) {
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



switch ($action) {

  case 'login':
    $check = loginAccount();
    break;

  case 'logout':
    session_unset();
    session_destroy();
    break;
}
