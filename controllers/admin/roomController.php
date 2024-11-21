<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        include_once 'models/admin/roomModel.php';
        include_once 'views/admin/rooms/room.php';
        break;
    case 'addRoom':
        include_once 'models/admin/roomModel.php';
        header('Location:index.php?controller=room');
        break;
    case 'destroyRoom':
        include_once 'models/admin/roomModel.php';
        header('Location:index.php?controller=room');
        break;
}
