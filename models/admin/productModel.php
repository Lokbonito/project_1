<?php

function indexProduct()
{
    $item_page = 5;
    $current = 1;
    if (isset($_GET['page'])) {
        $current = $_GET['page'];
    }
    $offset = ($current - 1) * $item_page;
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT count(*) FROM product";
    $query = mysqli_query($connect, $sqlCount);
    $numberOfItem = mysqli_fetch_array($query)[0];
    $totalPage = ceil($numberOfItem / $item_page);
    $sql = "SELECT product.*, category.name AS category_name, room.name AS room_name FROM product INNER JOIN category ON product.category_id = category.id INNER JOIN room ON product.room_id = room.id LIMIT $item_page OFFSET $offset ";
    $query = mysqli_query($connect, $sql);
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['totalPage'] = $totalPage;
    $array['product'] = $product;
    $array['currentPage'] = $current;
    return $array;
}

function selectCategory()
{
    include 'connect/openConnect.php';
    $sql = "SELECT * FROM category";
    $categorys = mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
    return $categorys;
}
function selectRoom()
{
    include 'connect/openConnect.php';
    $sql = "SELECT * FROM room";
    $rooms = mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
    return $rooms;
}

function addProduct()
{
    $image = $_FILES["image"]["name"];
    $image_name_default = explode(".", $_FILES["image"]["name"]);
    $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
    $target_file = "imgs/" . basename($image_name);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $name = $_POST['name'];
    $size = $_POST['size'];
    $fabric = $_POST['fabric'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $room_id = $_POST['room_id'];
    include_once 'connect/openConnect.php';
    $sql = "INSERT INTO product(image ,name, size, fabric, price, amount, description ,category_id, room_id) VALUES ('$image','$name','$size','$fabric',$price, $amount,'$description', $category_id, $room_id)";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}

function edit()
{
    $id = $_GET['id'];
    include 'connect/openConnect.php';
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $products = mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
    return $products;
}

function update()
{
    $id = $_POST['id'];
    $old_image = $_POST['old_image'];
    if ((!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']))) {
        $image_name = $old_image;
    } else {
        $image_name_default = explode(".", $_FILES["image"]["name"]);
        $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
        $target_file = "imgs/" . basename($image_name);
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
    }

    $name = $_POST['name'];
    $size = $_POST['size'];
    $fabric = $_POST['fabric'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $room_id = $_POST['room_id'];
    include_once 'connect/openConnect.php';
    $sql = "UPDATE product SET image ='$image_name', name = '$name', size = '$size',  fabric = '$fabric', price = '$price', amount = '$amount', description = '$description', category_id = '$category_id', room_id = '$room_id' WHERE id = $id";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}



function destroyProduct()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT COUNT(*) as count FROM bill_detail WHERE id_product = $id";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if ($data['count'] > 0) {
        echo '<script language="javascript">
        alert("cannot delete product");
        window.location.href="?controller=product";
        </script>';
    } else {
        $sql = "DELETE FROM product WHERE id = '$id'";
        mysqli_query($connect, $sql);
        header('Location:index.php?controller=product');
    }
    include_once 'connect/closeConnect.php';
}

switch ($action) {
    case '':
        $array = indexProduct();
        break;
    case 'add':
        $categorys = selectCategory();
        $rooms = selectRoom();
        break;
    case 'addProduct':
        addProduct();
        break;
    case 'edit':
        $categorys = selectCategory();
        $rooms = selectRoom();
        $products = edit();
        break;
    case 'update':
        update();
        break;
    case 'destroy':
        destroyProduct();
        break;
}
