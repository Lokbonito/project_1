   <?php
    $action = '';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    switch ($action) {
        case '':
            include_once 'models/admin/loginAdminModel.php';
            include_once 'views/admin/login.php';
            break;

        case "login":
            include_once 'models/admin/loginAdminModel.php';
            if ($check == 0) {
                echo '<script language="javascript">
                alert("Email or password incorrect");
                window.location.href="index.php?controller=admin";
                </script>';
            } elseif ($check == 1) {
                header('Location:index.php?controller=dashboard');
            }
            break;

        case 'logout':
            include_once 'models/admin/loginAdminModel.php';
            header('Location:index.php?controller=admin');
            break;
    }
