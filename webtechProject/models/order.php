<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/db-connect.php';


function createOrder($items, $address, $price, $email) {
    $currentDate = date("Y-m-d");
    global $conn;
    $stmt = $conn->prepare("INSERT INTO orderList (item, date, address, price, user, delivered) VALUES (?, ?, ?, ?, ?, ?)");
    //print_r($conn->error_list);
    $delivered = 0;
    $stmt->bind_param('sssisi', $items, $currentDate, $address, $price, $email, $delivered);
    $res = $stmt->execute();
    if(!$res) {
        return 'User is failed to insert\n'.$conn->error;
        //return false;
    } else {
        return true;
    }
}
function markAsDelivered($id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE orderList SET delivered=? WHERE order_id=?");
    $delivered = 1;
    $stmt->bind_param("ii", $delivered, $id);
    $res = $stmt->execute();
    if(!$res) {
        return 'User is failed to insert\n'.$conn->error;
        //return false;
    } else {
        return true;
    }
}
function getUndeliveredOrders() {
    global $conn;
    global $conn;
    $orders = array();

    $res = $conn->query("SELECT * FROM orderList WHERE delivered=0");

    while ($row = $res->fetch_assoc()) {
        array_push($orders, $row);
    }
    return $orders;
}