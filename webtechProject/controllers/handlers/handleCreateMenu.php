<?php
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/menu.php'; 

    if(!isset($_POST['create_menu'])) {
        header("Location: http://localhost/webtechProject/views/backend/dashboard.php");
        exit();
    } 

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    $target_file = '';
    $target_dir = '../../image/menu/';
    $target_file = $target_dir . basename($_FILES['imageFile']['name']);
    $img_location = 'image/menu/' . basename($_FILES['imageFile']['name']);
    if(move_uploaded_file($_FILES['imageFile']['tmp_name'], $target_file)) {
        $file_status = 'Upload Successful';
    } else  {
        $file_status = "Something went wrong";
    }

    echo $type;

    $menu = new Menu($title, $subtitle, $desc, $price, $img_location, $type);
    $res = $menu->save();
    echo $res;
    if($res) {
        header("Location: http://localhost/webtechProject/views/backend/dashboard.php?success=true");
    } else {
        header("Location: http://localhost/webtechProject/views/backend/dashboard.php?success=".$res);
    }
    
?>