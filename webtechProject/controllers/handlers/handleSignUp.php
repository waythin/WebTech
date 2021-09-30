<?php
    // if(!isset($_POST['sign_up'])) {
    //     header('Location: http://localhost/webtechProject/views/login.php');
    // }
    
    include '../user.php';

    $errors = array();
    $queryString = '';
    $fname = null; 
    $lname = null; 
    $email = null; 
    $pwd = null;
    $cpwd = null; 
    $gender = null;
    $dob = null;
    $favFoodsArray = array();
    $favFoods = "";
    $today = new DateTime();
    $dobphp = null;

    if(isset($_POST['sign_up'])) {
        $errors = array();
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $dobphp = new DateTime($dob);
        $favFoodsArray = $_POST['favfood'];
    }
    foreach($favFoodsArray as $index=>$food) {
        $favFoods .= $food;
        if($index !== count($favFoodsArray) - 1) {
            $favFoods.= ",";
        }
    }
    if(strlen($fname) < 2 || !preg_match("/^[a-zA-Z].*/", $fname)) {
        if(!empty($fname)) {
            $queryString .= 'fname=false&';
            $errors['fname'] = 'Username cannot be less than 2 characters and first letter have to be letter';
        }
    }
    if(!preg_match("/^[a-zA-Z].*/", $lname)) {
        if(!empty($lname)) {
            $queryString .= 'lname=false&';
            $errors['fname'] = 'First letter have to be letter';
        }        
    }
    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
        if(!empty($email)) {
            $queryString .= 'email=false&';
            $errors['email'] = 'Wrong email format';
        }
    }
    $user = User::getUser($email);
    if($user !== null) {
        $queryString .= 'duplicate=false&';
        $errors['duplicate'] = 'This email is already taken';
    }
    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $pwd)) {
        if(!empty($pwd)) {
            $queryString .= 'pwd=false&';
            $errors['pwd'] = 'Password must contain minimum eight characters, at least one letter, one number and one special character';
        }
    }

    if($pwd !== $cpwd) {
        $queryString .= 'cpwd=false&';
        $errors['cpwd'] = 'Both password must match';
    }
    if(count($favFoodsArray) === 0) {
        $queryString .= 'favfood=false&';
        $errors['favfood'] = 'Please select atleast one food';
    }
    if($dobphp > $today) {
        $queryString .= 'date=false&';
        $errors['date'] = 'Future date cannot be a birthdate';
    }
    if(empty($fname) || empty($email) || empty($pwd) || empty($cpwd) || empty($dob)) {
        $queryString .= 'empty=true&';
        $errors['empty'] = 'Please fill up all the forms to sign up';
        //var_dump($errors);
        //echo "1.". $fname." ". $lname. " ". $email. " ". $pwd. " ". $favFoods;
        header('Location: http://localhost/webtechProject/views/login2.php?'.$queryString);
    } else {
        if(count($errors) === 0) {
            $user = new User('customer', array(
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'pwd' => $pwd,
                'gender' => $gender,
                'dob' => $dob,
                'address' => '',
                'favourite_foods' => $favFoods,
                'image' => $image
            ));
            $msg = $user->save();
            if($msg) {
                header('Location: http://localhost/webtechProject/views/login2.php?saved=true');
            } else {
                header('Location: http://localhost/webtechProject/views/login2.php?dbError=true');
            }         
            
        } else {
            var_dump($errors);
            //echo "2". $fname." ". $lname. " ". $email. " ". $pwd. " ". $favFoods;
            header('Location: http://localhost/webtechProject/views/login2.php?'.$queryString);
        }
    }

    

?>