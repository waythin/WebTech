<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';


    if(!isset($_POST['update_profile'])) {
        header('Location: http://localhost/webtechProject/views/editProfile.php');
    }

    $username = $_POST['name'];
    $location = $_POST['location'];
    $contact_no = $_POST['contact_no'];

    $_SESSION['username'] = $username;
    $_SESSION['location'] = $location;
    $_SESSION['contact_no'] = $contact_no;

    $msg = User::edit($_SESSION['role'], $username, $_SESSION['email'], $contact_no, $location, $_SESSION['image']);

    echo $username." ".$location." ".$contact_no;

if(!$msg) {
    header('Location: http://localhost/webtechProject/views/editProfile.php?Updatesuccess=false');
    exit();
}
header('Location: http://localhost/webtechProject/views/editProfile.php?Updatesuccess=true');
