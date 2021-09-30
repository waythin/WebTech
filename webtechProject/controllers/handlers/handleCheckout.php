<?php 
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/menu.php';
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/order.php';
session_start();
    if(!isset($_SESSION['id'])) {
        header("Location: http://localhost/webtechProject/views/menu2.php?loggedin=false");
        exit();
    }
    $cartList = $_SESSION['cartList'];
    $cartOrderList = array();
    $orderList = "";
    $price = 0;
    foreach($cartList as $item) {
        $menu = Menu::getMenuById($item);
        array_push($cartOrderList, $menu);
        $orderList .= $menu['title'].",";
        $price += $menu['price'];
    }
    //Removed last comma from the string
    $orderList = substr($orderList, 0, -1);
    createOrder($orderList, $_SESSION['address'], $price + 0.15*$price, $_SESSION['email']);
    var_dump($cartOrderList);
?>