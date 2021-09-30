<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/menu.php';

    session_start();
    $count = $_SESSION['cart_count'];
    $cartList = $_SESSION['cartList'];

    $cartOrderList = array();

    foreach($cartList as $item) {
        array_push($cartOrderList, Menu::getMenuById($item));
    }

    header('Content-Type: application/json');
    die(json_encode($cartOrderList));

