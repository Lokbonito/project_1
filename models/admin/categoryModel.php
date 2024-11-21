<?php

function indexCategory()
{
    $sql = "SELECT * FROM category";
    include_once 'connect/openConnect.php';
    $category = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['category'] = $category;
    return $array;
}
function addCategory()
{
    $name = $_POST['name'];
    include_once 'connect/openConnect.php';
    $sql = "INSERT INTO category(name) VALUES ('$name')";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}

function destroyCategory()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "DELETE FROM category WHERE id = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}

switch ($action) {
    case '':
        $array = indexCategory();
        break;
    case 'addCategory':
        addCategory();
        break;
    case 'destroyCategory':
        destroyCategory();
        break;
}
