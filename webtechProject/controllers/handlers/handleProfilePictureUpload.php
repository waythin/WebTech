<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';

if(!isset($_POST['upload_profile_picture'])) {
    header("Location: http://localhost/webtechProject/views/editProfile.php");
    exit();
}
$target_file = '';

$target_dir = '../../image/profile-picture/';
$target_file = $target_dir . basename($_FILES['profile_picture']['name']);
$location = 'image/profile-picture/'.basename($_FILES['profile_picture']['name']);

if(move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
    $file_status = 'Upload Successful';
    $res = User::updateProfilePicture($_SESSION['uid'], $location);
    if(!$res) {
        header("Location: http://localhost/webtechProject/views/editProfile.php?pictureUploaded=false");
        exit();
    }
    $_SESSION['image'] = $location;
    header("Location: http://localhost/webtechProject/views/editProfile.php?pictureUploaded=true");

} else  {
    $file_status = "Something went wrong";
    //echo gethostname();
    header("Location: http://localhost/webtechProject/views/editProfile.php?upload=false");

}


