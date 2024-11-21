<?php

function item_page()
{
    include_once 'connect/openConnect.php';
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 1;
    include_once 'connect/closeConnect.php';
    return $item_per_page;
}

function current_page()
{
    include_once 'connect/openConnect.php';
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    include_once 'connect/closeConnect.php';
    return $current_page;
}

function item_per_page()
{
    include_once 'connect/openConnect.php';
    global $connect;
    $item_per_page = item_page();
    $current_page = current_page();
    $off_set = ($current_page - 1) * $item_per_page;
    $products = mysqli_query($connect, "SELECT * FROM `product` ORDER BY 'id' ASC LIMIT " . $item_per_page . " OFFSET " . $off_set);
    include_once 'connect/closeConnect.php';
    return $products;
}

function totalPages()
{
    include_once 'connect/openConnect.php';
    global $connect;
    $item_per_page = item_page();
    $totalRecords = mysqli_query($connect, "SELECT * FROM `product`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    include_once 'connect/closeConnect.php';
    return $totalPages;
}


switch ($action) {
    case '':
        $item_per_page = item_page();
        $current_page = current_page();
        $products = item_per_page();
        $totalPages = totalPages();
}
