<?php

function getCustomer()
{

    if (!isset($_SESSION['user_id'])) return ['name' => '', 'phonenumber' => '', 'address' => ''];
    $id = $_SESSION['user_id'];
    include "connect/openConnect.php";
    $sql = "SELECT * FROM account WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $user = mysqli_fetch_assoc($query);
    include "connect/closeConnect.php";
    return $user;
}
function index()
{
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) return ['data' => [], 'total_price' => 0];
    $array = [];
    $totalPrice = 0;
    $cart = $_SESSION['cart'];
    include "connect/openConnect.php";
    foreach ($cart as $key => $value) {
        $sql = "SELECT * FROM product WHERE id = $key";
        $query = mysqli_query($connect, $sql);
        $prod = mysqli_fetch_assoc($query);
        $prod['amount_cart'] = $value;
        $totalPrice += $prod['amount_cart'] * $prod['price'];
        $array['data'][] = $prod;
    }
    $array['total_price'] = $totalPrice;
    include "connect/closeConnect.php";
    return $array;
}

function addToCart()
{
    $amount = 1;
    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
    }
    $id = $_GET['id'];
    include "connect/openConnect.php";
    $sql = "SELECT amount FROM product WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $available_quantity = $row['amount'];
    if ($amount > $available_quantity) {
        $_SESSION['error'] = "The quantity entered for product $id is greater than the available quantity.";
        echo '<script language="javascript">
            alert("Quantity is not enough to fulfill this request");
            window.location.href="?controller=productDetail&id=' . $id . '";
            </script>';
        exit;
    }
    if (isset($_SESSION['cart'][$id])) {
        $amount = $amount + $_SESSION['cart'][$id];
    }
    $_SESSION['cart'][$id] = $amount;
    include "connect/closeConnect.php";
    header("Location: ?controller=cart");
}


function destroyCartInSession()
{
    if (!isset($_GET['id'])) return;
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("location: ?controller=cart");
}

function changeAmount()
{
    $id = $_GET['id'];
    if (!isset($_SESSION['cart'][$id])) return header("Location: ?controller=cart");
    $func = $_GET['func'];
    switch ($func) {
        case 'add': {
                $amount = $_SESSION['cart'][$id];
                if ($amount >= 10) return header("Location: ?controller=cart");
                $_SESSION['cart'][$id] = $amount + 1;
            }
            break;
        case 'minus': {
                $amount = $_SESSION['cart'][$id];
                if ($amount == 1) {
                    unset($_SESSION['cart'][$id]);
                    return header("Location: ?controller=cart");
                }
                $_SESSION['cart'][$id] = $amount - 1;
            }
            break;
    }
    header("Location: ?controller=cart");
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
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        header("Location: ?controller=orderBrowsing");
        return;
    }
    include "connect/openConnect.php";
    $arr = $_SESSION['cart'];
    $order_code = generateRandomString();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM account WHERE id = $user_id";
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($query);
    $cus_name = $result['name'];
    $phone_number = $result['phonenumber'];
    $address = $result['address'];
    $sqlAddOrder = "INSERT INTO bill(status, order_code, phone_number, address, customer_name, id_delivery_method, id_payment_method) VALUES (1, '$order_code', '$phone_number', '$address', '$cus_name', 1, 1)";
    if (mysqli_query($connect, $sqlAddOrder)) {
        $last_id = mysqli_insert_id($connect);
        foreach ($arr as $key => $val) {
            $sqlSelectProduct = "SELECT price FROM product WHERE id = $key";
            $query = mysqli_query($connect, $sqlSelectProduct);
            $price = mysqli_fetch_array($query)['price'];
            $sqlInsertOrderDetail = "INSERT INTO bill_detail(amount, price, id_order, id_product) VALUES ('$val', '$price', '$last_id','$key')";
            $query = mysqli_query($connect, $sqlInsertOrderDetail);
            header("location: ?controller=cart");
        }
        unset($_SESSION['cart']);
        echo "new record successfully created" . $last_id;
    } else {
        echo "error" . $sql . "<break>" . mysqli_error($connect);
    }
    include "connect/closeConnect.php";
}



switch ($action) {
    case '': {
            $array = index();
            $user_info = getCustomer();
        }
        break;
    case 'addToCart': {
            addToCart();
        }
        break;
    case 'destroy': {
            destroyCartInSession();
        }
        break;
    case 'changeAmount': {
            changeAmount();
        }
        break;
    case 'store': {
            store();
        }
        break;
}
