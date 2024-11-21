<?php

function indexOrder()
{
    $item_page = 5;
    $current = 1;
    $search_order = "";
    if (isset($_GET['page'])) {
        $current = $_GET['page'];
    }
    if (isset($_POST['search_order'])) {
        $search_order = $_POST['search_order'];
    }

    $offset = ($current - 1) * $item_page;
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT count(*) FROM bill WHERE order_code LIKE '%$search_order%' OR purchase_date LIKE '%$search_order%'";
    $query = mysqli_query($connect, $sqlCount);
    $numberOfItem = mysqli_fetch_array($query)[0];
    $totalPage = ceil($numberOfItem / $item_page);

    $result = [];
    $sqlGetOrders = "SELECT * FROM bill WHERE order_code LIKE '%$search_order%' OR purchase_date LIKE '%$search_order%' LIMIT $item_page OFFSET $offset";
    $sqlQueryOrders = mysqli_query($connect, $sqlGetOrders);
    $result['data'] = $sqlQueryOrders;
    foreach ($sqlQueryOrders as $each) {
        $ToltalPrice = 0;
        $idOrder = $each['id'];
        $sqlToltalPrice = "SELECT price, amount FROM bill_detail WHERE id_order = $idOrder";
        $query = mysqli_query($connect, $sqlToltalPrice);
        foreach ($query as $item) {
            $ToltalPrice += $item['amount'] * $item['price'];
        }
        $result[$idOrder] = $ToltalPrice;
    }
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['result'] = $result;
    $array['totalPage'] = $totalPage;
    $array['currentPage'] = $current;
    return $array;
}


function getProducts()
{
    include_once 'connect/openConnect.php';
    $GetAllProduct = "SELECT * FROM product";
    $result = mysqli_query($connect, $GetAllProduct);
    include_once 'connect/closeConnect.php';
    return $result;
}


function getProductsInSeccion()
{
    if (!isset($_SESSION['order'])) return ['data' => [], 'price' => 0];
    $arr = $_SESSION['order'];
    $result = [];
    $array = [];
    $total_price = 0;
    include "connect/openConnect.php";
    foreach ($arr as $key  => $val) {
        $sql = "SELECT * FROM product WHERE id = $key";
        $query  = mysqli_query($connect, $sql);
        $item = mysqli_fetch_array($query);
        $item['amount_order'] = $val;
        $total_price += $item['price'] * $val;
        array_push($result, $item);
    }
    $array['price'] = $total_price;
    $array['data'] = $result;
    include "connect/closeConnect.php";
    return $array;
}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}


function store()
{
    if (!isset($_SESSION['order']) || count($_SESSION['order']) === 0) {
        header("Location: ?controller=order&action=add");
        return;
    }
    $cus_name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    include "connect/openConnect.php";
    $arr = $_SESSION['order'];
    $order_code = generateRandomString();
    $sqlAddOrder = "INSERT INTO bill(status, order_code, phone_number, address, customer_name, id_delivery_method, id_payment_method) VALUES ('$status', '$order_code', '$phone_number', '$address', '$cus_name', 1, 1)";
    if (mysqli_query($connect, $sqlAddOrder)) {
        $last_id = mysqli_insert_id($connect);
        foreach ($arr as $key => $val) {
            $sqlSelectProduct = "SELECT price FROM product WHERE id = $key";
            $query = mysqli_query($connect, $sqlSelectProduct);
            $price = mysqli_fetch_array($query)['price'];
            $sqlInsertOrderDetail = "INSERT INTO bill_detail(amount, price, id_order, id_product) VALUES ('$val', '$price', '$last_id','$key')";
            $query = mysqli_query($connect, $sqlInsertOrderDetail);
            header("location: ?controller=order");
        }
        unset($_SESSION['order']);
        echo "new record successfully created" . $last_id;
    } else {
        echo "error" . $sql . "<break>" . mysqli_error($connect);
    }
    include "connect/closeConnect.php";
}

function editOrder()
{
    if (!isset($_GET['id'])) return;
    $id = $_GET['id'];
    $array = [];
    $data = [];
    $total_price = 0;

    include "connect/openConnect.php";
    $sql = "SELECT * FROM bill WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $order = mysqli_fetch_array($query);
    if ($order['status'] == COMPLETED || $order['status'] == CANCELED) {
        return header("loaction:?controller=order");
    }
    $array['order'] = $order;
    $sql = "SELECT *,bill_detail.amount as amount_order FROM bill_detail WHERE id_order = $id";
    $query = mysqli_query($connect, $sql);
    foreach ($query as $each) {
        $id_product = $each['id_product'];
        $sql = "SELECT * FROM product WHERE id = $id_product";
        $query = mysqli_query($connect, $sql);
        $item = mysqli_fetch_array($query);
        $item['amount_order'] = $each['amount_order'];
        $total_price += $each['price'] * $each['amount_order'];
        $data[] = $item;
    };
    include "connect/closeConnect.php";
    $array['data'] = $data;
    $array['total_price'] = $total_price;
    return $array;
}


function updateOrder()
{
    if (!isset($_GET['id'])) return;
    $id = $_GET['id'];
    $status = $_POST['status'];
    include "connect/openConnect.php";
    $sql = "UPDATE bill SET status = $status WHERE id = $id";
    mysqli_query($connect, $sql);
    include "connect/closeConnect.php";
    header('location: ?controller=order');
}

function storeSession()
{
    $arr = $_POST['list_product'];
    include "connect/openConnect.php";
    foreach ($arr as $val) {
        $amount = 1;
        if (isset($_POST[$val]) && !empty($_POST[$val])) {
            $amount = (int)$_POST[$val];
        }
        $sql = "SELECT amount FROM product WHERE id = $val";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $available_quantity = $row['amount'];
        if ($amount > $available_quantity) {
            $_SESSION['error'] = "The quantity entered for product $val is greater than the available quantity.";
            echo '<script language="javascript">
            alert("Quantity is not enough to fulfill this request");
            window.location.href="?controller=order&action=add";
            </script>';
            exit();
        }
        if (isset($_SESSION['order'][$val])) {
            $amount = $amount + $_SESSION['order'][$val];
        }
        $_SESSION['order'][$val] = $amount;
    }
    foreach ($_SESSION['order'] as $id => $quantity) {
        $sql = "UPDATE product SET amount = amount - $quantity WHERE id = $id";
        mysqli_query($connect, $sql);
    }
    include "connect/closeConnect.php";
    header("location: ?controller=order&action=add");
}


function destroyOrderInSession()
{
    if (!isset($_GET['id'])) return;
    $id = $_GET['id'];
    unset($_SESSION['order'][$id]);
    header("location: ?controller=order&action=add");
}



switch ($action) {
    case '':
        $array = indexOrder();
        break;

    case 'add':
        $result = getProducts();
        $array = getProductsInSeccion();
        break;

    case 'store':
        store();
        break;

    case 'addCustomer':
        if (!isset($_SESSION['order']) || count($_SESSION['order']) === 0) {
            echo '<script language="javascript">
    alert("You must choose a product");
    window.location.href="?controller=order&action=add";
    </script>';
            return ['data' => [], 'price' => 0];
        }
        $array = getProductsInSeccion();
        break;

    case 'addProduct':
        storeSession();
        break;

    case 'edit':
        $array = editOrder();
        break;

    case 'update':
        updateOrder();
        break;

    case 'destroy':
        destroyOrderInSession();
        break;
}
