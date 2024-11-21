<?php

function getProducts($limit = 10)
{
    include 'connect/openConnect.php';
    $sql = "SELECT * FROM product WHERE amount > 0 LIMIT $limit";
    $product = mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
    return $product;
}

function getAllProducts()
{
    $search_category = "";
    if (isset($_POST['name_category'])) {
        $search_category = $_POST['name_category'];
    }
    include 'connect/openConnect.php';
    $sql = "SELECT product.*, category.name AS name_category FROM product INNER JOIN category ON product.category_id = category.id WHERE category.name LIKE '%$search_category%'";
    $product = mysqli_query($connect, $sql);
    include 'connect/closeConnect.php';
    return $product;
}

switch ($action) {
    case '':
        $slides = getProducts(5);
        $new_product = getAllProducts();
        break;
}
