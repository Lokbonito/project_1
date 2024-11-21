<?php

function indexCart()
{
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT count(*) FROM bill WHERE order_code";
    $query = mysqli_query($connect, $sqlCount);
    $sqlGetOrders = "SELECT * FROM bill";
    $sqlQueryOrders = mysqli_query($connect, $sqlGetOrders);
    $array = array();
    foreach ($sqlQueryOrders as $each) {
        $order = [];
        $totalPrice = 0;
        $idOrder = $each['id'];
        $sqlTotalPrice = "SELECT bill_detail.amount, product.image, product.price, product.name, bill.id_delivery_method, bill.id_payment_method FROM bill_detail INNER JOIN product ON bill_detail.id_product = product.id INNER JOIN bill on bill_detail.id_order = bill.id WHERE bill_detail.id_order = $idOrder";
        $query = mysqli_query($connect, $sqlTotalPrice);
        foreach ($query as $item) {
            $totalPrice += $item['amount'] * $item['price'];
        }
        $order['result'] = $query;
        $order['order'] = $each;
        $order['total_price'] = $totalPrice;
        $array[] = $order;
    }
    include_once 'connect/closeConnect.php';
    return $array;
}



function updateCart()
{
    if (!isset($_GET['id'])) return;
    $id = $_GET['id'];
    $status = $_POST['status'];
    include "connect/openConnect.php";
    $sql = "UPDATE bill SET status = $status WHERE id = $id";
    mysqli_query($connect, $sql);
    include "connect/closeConnect.php";
}

function canceled()
{
    if (!isset($_GET['id'])) return;
    $id = $_GET['id'];
    include "connect/openConnect.php";
    $sql = "UPDATE bill SET status = 4 WHERE id = $id";
    mysqli_query($connect, $sql);
    include "connect/closeConnect.php";
}



switch ($action) {

    case '': {
            $array = indexCart();
        }
        break;
    case 'update': {
            updateCart();
        }
        break;
    case 'cancel': {
            canceled();
        }
        break;
}
