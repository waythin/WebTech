<?php $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject/';
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/cookieLogin.php';
require $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/json.php';

$session_exists = false;    
if(isset($_SESSION['id'])) {
    $session_exists = true;
}

if(!$session_exists) {
    checkForLogin();    
}
//Retreiving json data
$data = getJSONData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIUB Restaurant</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">

    <title><?php echo $data['name'] ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/header2.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/main.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/homepage2.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/footer2.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/login2.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/menu2.css' ?>">
</head>
<body>
<div class="cart-overlay" id="cart-overlay">
        <img class="close-cart-overlay" id="close-cart-overlay" src="<?php echo $path.'image/ui/close.png' ?>" alt="">
        <h1>Cart</h1>
        <div class="cart-container">
            <div class="item-list">
                <div class="item-list-heading">
                    <div class="list-title-items">Items</div>
                    <div class="list-title-amount">Amount</div>
                    <div class="list-title-price">Price</div>
                </div>

                <div class="items"></div>
            </div>
            <div class="memo">
                <div class="title"><h2>Memo</h2></div>
                <div class="details">
                    <table>
                        <tr>
                            <th>Amount</th>
                            <td id="memo_amount">3</td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td id="memo_subtotal">750/-</td>
                        </tr>
                        <tr>
                            <th>Vat</th>
                            <td>15%</td>
                        </tr>
                        <tr>
                            <th>Calculated Vat</th>
                            <td id="memo_calculated_vat">115.5/-</td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td id="memo_total">862.5/-</td>
                        </tr>
                    </table>
                </div>

                <div class="payment-method">
                    <p>Payment Method</p>
                    <p>Cash On Delivery</p>
                </div>

                <a href="<?php echo $path.'controllers/handlers/handleCheckout.php' ?>" class="checkout-button">Checkout</a>
            </div>
        </div>
    </div>
    <?php if($session_exists) {
        if($_SESSION['role'] !== 'customer') {
                echo '
                <div class="dashboard-button-container">
                    <a href="'.$path.'/views/backend/manageOrders.php' .'">Go To Dashboard</a>
                </div>
            ';
            } 
        }                       
        ?>
    <div class="page-title">
        <p><?php echo $data['name'] ?></p>
    </div>
    <div class="container">
        <nav>
            <ul>
                <a href=""><li><img src="<?php echo $path."image/ui/info.png" ?>" alt=""><p>About Us</p></li></a>
                <a href="<?php echo $path."index.php" ?>" class="selected-menu"><li><img src="<?php echo $path."image/ui/home-selected.png" ?>" alt=""><p>Home</p></li></a>
                <a href=""><li><img src="<?php echo $path."image/ui/calendar.png" ?>" alt=""><p>Reservations</p></li></a>
                <a href="<?php echo $path."views/menu2.php" ?>"><li><img src="<?php echo $path."image/ui/menu.png" ?>" alt=""><p>Menu</p></li></a>
                <a href=""><li><img src="<?php echo $path."image/ui/contact.png" ?>" alt=""><p>Contact Us</p></li></a>
                <!-- <a href="<?php echo $path."views/login2.php" ?>"><li><img src="<?php echo $path."image/ui/user.png" ?>" alt=""><p>Login/Register</p></li></a> -->
                <?php
                    if($session_exists) {
                        // echo '<li><a href="'.$path.'/views/editProfile.php">'.$_SESSION['lname'].'</a></li>';
                        // echo '<li><a href="'.$path.'/controllers/handlers/handleLogout.php">Logout</a></li>';
                        echo '<a href="'.$path.'views/editProfile.php"><li><img src="'.$path.'image/ui/edit-user.png" alt=""><p>Profile</p></li></a>';
                        echo '<a href="'.$path.'controllers/handlers/handleLogout.php"><li><img src="'.$path.'image/ui/log-out.png" alt=""><p>Logout</p></li></a>';
                    } else {
                        echo '<a href="'.$path.'views/login2.php"><li><img src="'.$path.'image/ui/user.png" alt=""><p>Login/Register</p></li></a>';
                    }
                ?>
            </ul>
        </nav>
        <div class="cart" id="cart">
            <i class="fas fa-cart-plus"></i>
            <div class="cart-item-number" id="cart-item-number">0</div>
        </div>
        