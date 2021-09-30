<?php

    session_start();

    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/session.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/admin.php';

    //searchAdmin('abt');
    //var_dump(User::searchUser('abt'));
    // User::editUser('admin', 'abtahitajwar@gmail.com', array(
    //     'fname' => 'abtahi',
    //     'lname' => 'tajwar',
    //     'dob' => '1999-11-12',
    //     'address' => 'Nawabsiruddaula road, chawkbazar, chittagong'
    // ));

    // Insert User
    // $user = new User('customer', array(
    //     'fname' => 'mehedi',
    //     'lname' => 'hassan',
    //     'email' => 'hasan.mehedi@gmail.com',
    //     'pwd' => 'Hello1526$',
    //     'dob' => '1999-01-01',
    //     'gender' => 'male',
    //     'address' => 'Pabna',
    //     'favourite_foods' => 'dessert',
    //     'image' => ''
    // ));
    // $user->save();

    //Edit User
    // User::editUser('customer', 'ibrahimmohim@gmail.com', array(
    //     'fname' => 'Ibrahim'
    // ));
    
    echo $_SESSION['email'];
    echo $_SESSION['address'];
    //var_dump(User::getUser('abtahitajwarrr@gmail.com'));
?>