<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';

if(!isset($_POST['update_password'])) {
    header("Location: http://localhost/webtechProject/views/editProfile.php");
}

$old_pwd = $_POST['old_pwd'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];

if(!User::checkUserPassword($_SESSION['uid'], $old_pwd)) {
    header("Location: http://localhost/webtechProject/views/editProfile.php?wrong=true");
    exit();
}
if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $pwd)) {
    header("Location: http://localhost/webtechProject/views/editProfile.php?format=false");
} 
if($pwd !== $cpwd) {
    header("Location: http://localhost/webtechProject/views/editProfile.php?match=false");
}

$res = User::changePassword($_SESSION['uid'], $pwd);
header("Location: http://localhost/webtechProject/views/editProfile.php?success=".$res);

