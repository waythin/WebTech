<?php
 include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';
    

    $errors = array();
    $queryString = '';
    $firstname = ""; 
    $lastname = ""; 
    $email = ""; 
    $phone="";
    $password = "";
    $cpassword = ""; 
    $address="";
    $nid="";
    $gender="";
    $dob="";
    $ride="";
    $strarttime="";
    $endtime="";
    $pic="";
    $check="";


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {

    if(isset($_REQUEST['sign_up'])) {
        $errors = array();
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $password = $_REQUEST['password'];
        $cpassword = $_REQUEST['cpassword'];
        $nid = $_REQUEST['nid'];
        $address = $_REQUEST['address'];
        $gender = $_REQUEST['gender'];
        $dob = $_REQUEST['dob'];
        $ride = $_REQUEST['ride'];
        $strarttime = $_REQUEST['starttime'];
        $endtime = $_REQUEST['endtime'];
        $pic = $_REQUEST['pic'];
        $check = $_REQUEST['check'];
        
        
   

    }
    

    
    if(strlen($firstname) < 2 || !preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
        $queryString .= 'firstname=false&';
        
        $errors['firstname'] = 'Username cannot have white spaces and less than 2 characters';
    }

    if(strlen($lastname) < 2 || !preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
        $queryString .= 'lastname=false&';
        $errors['lastname'] = 'Username cannot have white spaces and less than 2 characters';
    }

    if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
    {
        $queryString .= 'email=false&';
        $errors['email'] = 'Wrong email format';
    }

    if(empty($phone) || !preg_match("/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/",$phone))
    {
        $queryString .= 'phone=false&';
        $errors['phone'] = 'Type correct phone number';
    }
  
    
   

    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password)) {
        $queryString .= 'password=false&';
        $errors['password'] = 'Password must contain minimum eight characters, at least one letter, one number and one special character';
    }

    if($password !== $cpassword) {
        $queryString .= 'cpassword=false&';
        $errors['cpassword'] = 'Both password must match';
    }

    if(empty($nid) || !preg_match("/^([0-9]{10}|[0-9]{13})$/",$nid))
    {
        $queryString .= 'nid=false&';
        $errors['nid'] = 'Type correct NID';
    }
    if(empty($address))
    {
        $queryString .= 'address=false&';
        $errors['address'] = 'Type your Address';
    }
    // if(!empty($pic))
    // {
    //     $var1=explode('.',$pic);
        
    //     $var2=strtolower(end($var1));
        
    //     $accept=array('jpg','jpeg','png','webp');
    //     if(!in_array($var2,$accept));
    //     {
    //         $queryString .= 'pic=false&';
    //         $errors['pic'] = 'You must provide a picture in correct format';
    //     }
       
    // }
    // else {
    //     $queryString .= 'pic=false&';
    //     $errors['pic'] = 'You must provide a picture';
    // }
    

    

    

    if(empty($firstname) || empty($lastname) || empty($email) || empty($phone) ||  empty($password) || empty($cpassword) || empty($nid) || empty($address) || empty($dob) || empty($strarttime) || empty($endtime) || empty($pic) || empty($check) ) {
        $queryString .= 'empty=true&';
        $errors['empty'] = 'Please fill up all the forms to sign up';
         header('Location: Location: http://localhost/webtechProject/views/riderSignup.php?'.$queryString);
    } 
    else {
        if(count($errors) === 0) {
            $user = new User('rider', array(
                'fname' => $firstname,
                'lname' => $lastname,
                'email' => $email,
                'phone' => $phone,
                'pwd' => $password,
                'dob' => $dob,
                'gender' => $gender,
                'vehicle' => $ride,
                'address' => $address,
                'NID' => $nid,
                'startingtime' => $strarttime,
                'endingtime' => $endtime,

                'image' => $pic
            ));
            $user->save();
            // $user = new User('rider', $firstname, $lastname, $email, $password, $phone, $nid, $dob, $gender, $address, $starttime, $endtime, $ride, $pic);
            // $msg = $user->save();
            // if($msg) {
            //     header('Location: http://localhost/webtechProject/views/login.php?saved=true');
            // } else {
            //     header('Location: http://localhost/webtechProject/views/login.php?dbError=true');
            // }
            
            
        } else {
            header('Location: http://localhost/webtechProject/views/riderSignup.php?'.$queryString);
        }
    }
    }
    

?>