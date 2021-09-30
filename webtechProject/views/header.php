<?php $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject'; 
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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;700&family=Redressed&display=swap" rel="stylesheet">    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">


    <title><?php echo $data['name'] ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/header.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/homepage.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/backend/permissions.css' ?>">
</head>
<body>
    <header>
    <?php if($session_exists) {
            if($_SESSION['role'] !== 'customer') {
                echo '
                <div class="dashboard-button-container">
                    <a href="'.$path.'/views/backend/dashboard.php' .'">Go To Dashboard</a>
                </div>
            ';
            } 
        }                       
        ?>

        <div class="topnav" id="topnav">
            <div class="main-logo">
                <h1><?php echo $data['name'] ?></h1>
            </div>
            <div class="hamburger" id="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="<?php echo $path ?>">Home</a></li>
                    <li><a href="<?php echo $path.'/views/menu.php'; ?>">Menu</a></li>
                    <li><a href="">Cart (0)</a></li>
                    <?php
                        if($session_exists) {
                            echo '<li><a href="'.$path.'/views/editProfile.php">'.$_SESSION['lname'].'</a></li>';
                            echo '<li><a href="'.$path.'/controllers/handlers/handleLogout.php">Logout</a></li>';
                        } else {
                            echo '<li><a href="'.$path.'/views/login.php">Sign In/Sign Up</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header> 



    <!-- Old UI -->
        <!-- <header>
            <?php if($session_exists) {
                if($_SESSION['role'] !== 'customer') {
                    echo '<td><a href="'.$path.'/views/backend/dashboard.php">Go to dashboard</a></td>';
                } 
            }                       
            ?>
            <!-- <a href="<?php echo $path.'/views/backend/dashboard.php'; ?>">Go to dashboard</a> -->
            <!-- <table width="1000px">                
                <td colspan="3"><h1><?php echo $data['name'] ?></h1></td>
                <td><a href="<?php echo $path ?>">Home</a></td>
                <td><a href="<?php echo $path.'/views/menu.php'; ?>">Menu</a></td>
                <td><a href="">Cart (0)</a></td>
                <?php
                if($session_exists) {
                    echo '<td><a href="'.$path.'/views/editProfile.php">'.$_SESSION['username'].'</a></td>';
                    echo '<td><a href="'.$path.'/controllers/handlers/handleLogout.php">Logout</a></td>';
                } else {
                    echo '<td><a href="'.$path.'/views/login.php">Sign In/Sign Up</a></td>';
                }
                ?>                
            </table>
        </header> -->
