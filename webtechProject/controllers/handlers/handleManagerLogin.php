<?php
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';
$errors = array();
$queryString = '';
$firstname = ""; 
$lastname = ""; 
$email = ""; 
$phonenumber = "";
$nid = "";
$address = "";
$gender = "";
$education = "";
$pic = "";
$birthday = ""; 
$password_1="";
$password_2="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if(isset($_REQUEST['submit'])) {
        $errors = array();
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $phonenumber = $_REQUEST['phonenumber'];
        $birthday = $_REQUEST['birthday'];
        $nid = $_REQUEST['nid'];
        $address = $_REQUEST['address'];
        $gender = $_REQUEST['gender'];
        $education = $_REQUEST['education'];
        $pic = $_REQUEST['pic'];
        $cv = $_REQUEST['cv'];
        $password_1 = $_REQUEST['password_1'];
        $password_2 = $_REQUEST['password_2'];
        //$radio= $_POST['radio'];

}

//$firstnameErr = $lastnameErr = $emailErr = $phonenumberErr = $birthdayErr = $firstname = $lastname = $email = $phonenumber = $birthday ="";
//$password_1Err = $password_2Err = $password_1 = $password_2 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["firstname"]))
    {
        $queryString .= 'firstname=false&';
        $errors['firstname'] = 'First Name is required';
        echo "firsname";
    }
    else
    {
        //$firstname = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname))
        {
            $queryString .= 'firstname=false&';
            $errors['firstname'] =  "Only letters and white space allowed";
            echo "firstnameII";
        }
    }

    if (empty($_POST["lastname"]))
    {
        $queryString .= 'lastname=false&';
        $errors['lastname'] = 'Last Name is required';
        echo "lastname";
    }
    else
    {
        //$lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname))
        {
            $queryString .= 'lastname=false&';
            $errors['lastname'] =  "Only letters and white space allowed";
            echo "lastnameII";
        }
    }
/*
    if(empty($email) || !pregmatch("/^([a-z0-9+-]+)(.[a-z0-9+_-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix",$email))
    {
        $queryString .= 'email=false&';
        $errors['email'] = 'Wrong email format';
    }


    if (empty($_POST["email"]))
    {
        $queryString .= 'email=false&';
        $errors['email'] = "Email is required";
        echo "email";
    }
    else
    {
        //$email = test_input($_POST["email"]);
        if (preg_match("/^([a-z0-9+-]+)(.[a-z0-9+_-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix",$email))
        {
            $queryString .= 'email=false&';
            $errors['email'] = 'Invalid email format';
            echo "emailII";
        }
    }
*/
    if (empty($_POST["email"]))
    {
        $queryString .= 'email=false&';
        $errors['email'] = "Email is required";
    }
    else
    {
        //$email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $queryString .= 'email=false&';
            $errors['email'] = 'Invalid email format';
        }
    }

    if (empty($_POST["phonenumber"]))
    {
        $queryString .= 'phonenumber=false&';
        $errors['phonenumber'] = "Phonenumber is required";
        echo "phone";
    }
    else
    {
        //$phonenumber = test_input($_POST["phonenumber"]);
        if (!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/",$_POST["phonenumber"])) {
            $queryString .= 'phonenumber=false&';
            $errors['phonenumber'] = 'Invalid contact number';
            echo "phoneII";
        }
    }

    if (empty($_POST["birthday"]))
    {
        $queryString .= 'birthday=false&';
        $errors['birthday'] = 'Date of Birth is required';
        echo "bob";
    }
    //NID
    if (empty($_POST["nid"]))
    {
        $queryString .= 'nid=false&';
        $errors['nid'] = "NID is required";
        echo "nid";
    }
    else
    {
        if (!preg_match("/^([0-9]{10}|[0-9]{13})$/",$nid)) {
            $queryString .= 'nid=false&';
            $errors['nid'] = 'Invalid National ID card number';
            echo "nidII";
        }
    }
    //address
    if (empty($_POST["address"]))
    {
        $queryString .= 'address=false&';
        $errors['address'] = 'Address is required';
        echo "address";
    }
    //gender
    if(empty($_POST['gender'])){
        $queryString .= 'gender=false&';
        $errors['gender'] = 'Gender is required';
        echo "gender";
       }

    //education
    if(empty($_POST['education'])){
        $queryString .= 'education=false&';
        $errors['education'] = 'Education is required';
        echo "gender";
       }
    
    //cover letter
    if (empty($_POST["cv"])) {
        $queryString .= 'cv=false&';
        $errors['cv'] = 'cv is required';
        echo "cv";
        }
    if (empty($_POST["password_1"]))
    {
        $queryString .= 'password_1=false&';
        $errors['password_1'] = "password is required";
        echo "passwordI";
    }
    else
    {
        //$password_1 = test_input($_POST["password_1"]);
        if (strlen($password_1)<8)
        {
            $queryString .= 'password_1=false&';
            $errors['password_1'] = "Password must be 8 charecters";
            echo "passwordII";
        }
        else if (!preg_match("/^([0-9]{10}|[0-9]{13})$/",$password_1))
        {
            $queryString .= 'password_1=false&';
            $errors['password_1'] = "Password must be 8 charecters";
            echo $password_1;
        }
    }


    if($password_1 !== $password_2) {
        $queryString .= 'password_2=false&';
        $errors['password_2'] = 'Both password must match';
        echo "password2";
    }
}


if(empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || empty($birthday) || empty($password_1) || empty($password_2)) {
    $queryString .= 'empty=true&';
    $errors['empty'] = 'Please fill up all the forms to sign up';
    echo "empty";
    header('Location: http://localhost/webtechProject/views/managerSignup.php?'.$queryString); 
} 
else
{
    if(count($errors) === 0)
    {
        $user = new User('manager', array(
            'fname' => $firstname,
            'lname' => $lastname,
            'email' => $email,
            'pwd' => $password_1,
            'dob' => $birthday,
            'gender' => $gender,
            'address' => $address,
            'image' => '',
            'phone' => $phonenumber,
            'coverletter' => $cv,
            'NID' => $nid,
            'education' => $education

        ));
        $user->save();
        echo "saved";
    }
    else
    {
        header('http://localhost/webtechProject/views/managerSignup.php?'.$queryString);
        echo "error";
    }
}
}

?>