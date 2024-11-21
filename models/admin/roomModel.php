<?php

function indexRoom()
{
    $sql = "SELECT * FROM room";
    include 'connect/openConnect.php';
    $room = mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
    $array = array();
    $array['room'] = $room;
    return $array;
}
function addRoom()
{
    $name = $_POST['name'];
    include 'connect/openConnect.php';
    $sql = "INSERT INTO room(name) VALUES ('$name')";
    mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
}

function destroyRoom()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "DELETE FROM room WHERE id = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}

switch ($action) {
    case '':
        $array = indexRoom();
        break;
    case 'addRoom':
        addRoom();
        break;
    case 'destroyRoom':
        destroyRoom();
        break;
}
