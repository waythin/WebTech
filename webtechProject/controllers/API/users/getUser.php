<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';

    $users = User::getUser($_GET['email']);
    header('Content-Type: application/json');
    die(json_encode($users));
?>