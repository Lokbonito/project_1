<?php

function getProducts($limit = 10)
{
    $id = $_GET['id'];
    include 'connect/openConnect.php';
    $sql = "SELECT * FROM product WHERE amount > 0 AND id != $id LIMIT $limit";
    $products = mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
    return $products;
}

function getProductById()
{
    $id = $_GET['id'];
    include 'connect/openConnect.php';
    $sql = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $product = mysqli_fetch_assoc($result);
    include 'connect/closeConnect.php';
    return $product;
}

switch ($action) {
    case '':
        $product = getProductById();
        $slides = getProducts(3);
        break;
}
