<?php 
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/session.php';

function checkForLogin() {
    if(isset($_COOKIE['email'])) {
        $user = User::getUser($_COOKIE['email']);
        if($user !== null) {
            Session::create($_COOKIE['email']);
        }        
    }
}
