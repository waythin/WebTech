<?php 
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/menu.php';
session_start();
$count = $_POST['count'];
$cartList = json_decode($_POST['cartList']);

$_SESSION['cart_count'] = $count;
$_SESSION['cartList'] = $cartList;


$cartOrderList = array();

foreach($cartList as $item) {
    array_push($cartOrderList, Menu::getMenuById($item));
}

header('Content-Type: application/json');
die(json_encode($cartOrderList));