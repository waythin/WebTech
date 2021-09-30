<?php
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/session.php';

$email = null;
$pwd = null;

if(isset($_POST['login'])) {
    $email = htmlspecialchars(stripslashes($_POST['email']));
    $pwd = htmlspecialchars(stripslashes($_POST['pwd']));
    //$remember = htmlspecialchars(stripslashes($_POST['remember']));

    $result = User::getUser($email);
    $user = $result['data'];
    if($user === null) {
        header('Location: http://localhost/webtechProject/views/login2.php?loginFailed=true');
    } else {
        if($pwd === $user['password']) {
            Session::create($email);
            //header('Location: http://localhost/webtechProject/index.php?cookie='.$_POST['remember']);
            if(isset($_POST['remember'])) {
                setcookie('email', htmlspecialchars(stripslashes($_SESSION['email'])), time() + 86400*7);
                header('Location: http://localhost/webtechProject/index.php?cookie=on');
                exit();
            }
            header('Location: http://localhost/webtechProject/index.php');
            exit();
        }
        else {
            header('Location: http://localhost/webtechProject/views/login2.php?loginFailed=true');
        }
        
    }
    
} else {
    header('Location: http://localhost/webtechProject/views/login2.php');
}