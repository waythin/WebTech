<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';

    $user = new User('customer', array(
        'fname' => 'john',
        'lname' => 'doe',
        'email' => 'john.doe@gmail.com',
        'pwd' => 'Hello1526$',
        'dob' => '1999-01-01',
        'gender' => 'male',
        'address' => 'Pabna',
        'favourite_foods' => 'dessert',
        'image' => ''
    ));
    $user->save();
?>