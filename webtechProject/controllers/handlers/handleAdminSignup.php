<?php

include $_SERVER['DOCUMENT_ROOT']."/webtechProject/controllers/user.php";

$validfname="";
$validlname="";
$validemail="";
$validpwd="";
$validcpwd="";
$validpno="";
$validnid="";
$validrefno="";
$validworkxp="";
$validdob="";
$validgender="";
$validcheckbox="";

if ($_SERVER["REQUEST_METHOD"]== "POST" )
{
    $fname = $_REQUEST["fname"]; 
    $lname = $_REQUEST["lname"]; 
    $email = $_REQUEST["email"]; 
    $pwd = $_REQUEST["pwd"]; 
    $cpwd = $_REQUEST["cpwd"]; 
    $pno = $_REQUEST["pno"]; 
    $nid = $_REQUEST["nid"];
    $refno = $_REQUEST["refno"];
    $workxp = $_REQUEST["workxp"];
    $dob = $_REQUEST["dob"];
    $gender = $_REQUEST["gender"];
    $checkbox=$_REQUEST["box"]; 
    $errcount = 0;


    if (empty($fname))
    {
      $validfname= "Name cannot be empty";
      $errcount++;
    }
    else if(strlen($fname)<4 || !preg_match("/^[A-Za-z][a-zA-Z0-9._]*$/",$fname))
    {
      $validfname= "Name more than 3 characters, must start with a character";
      $errcount++;
    }
    else
    {
      $validfname1 =" First Name : ".$fname;
      echo "<br>";
    }

    if (empty($lname))
    {
      $validlname= "Name cannot be empty";
      $errcount++;
    }
    else if(strlen($lname)<4 || !preg_match("/^[A-Za-z][a-zA-Z0-9._]*$/",$lname))
    {
      $validlname= "Name more than 3 characters, must start with a character";
      $errcount++;
    }
    else
    {
      $validlname1="Last Name : ".$lname;
      echo "<br>";
    }

    if (empty($email))
    {
      $validemail= "Email cannot be empty";
      $errcount++;
    }
    else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/",$email))
    {
        $validemail="Enter a valid E-mail ";
        $errcount++;
    }
    else
    {
        $validemail1= "E-mail : ".$email;
    }

    if (empty($pwd))
    {
      $validpwd= "Password cannot be empty";
      $errcount++;
    }
    else if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$pwd))
    {
      $validpwd= "Password must contain atleast 8 characters including 1 uppercase, 1 lowercase, 1 number, 1 special character";
      $errcount++;
    }
    else
    {
      $validpwd1= " Password : ".$pwd;
      echo "<br>";
    }

    if (empty($cpwd))
    {
      $validcpwd= "Password cannot be empty";
      $errcount++;
    }
    else
    {
      if($pwd==$cpwd)
      {
        $validcpwd1= "password matched ";
        echo "<br>";
      }
      else
      {
        $validcpwd="Password doesn't match, try again!";
        $errcount++;
      }
      
    }

    if(empty($pno) )
    {
      $validpno="Phone number cannot be empty";
      $errcount++;
    }
    else if (!preg_match("/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/", $pno))
    {
      $validpno= "Enter Valid Phone Number";
      $errcount++;
    }
    else
    {
      $validpno1="Phone Number : ".$pno;
      echo "<br>";
    }

    if (empty($nid))
    {
      $validnid= "NID cannot be empty";
      $errcount++;
    }
    elseif (!preg_match("/^[0-9]{10,13}+$/", $nid))
    {
      $validnid= "Enter Valid NID ";
      $errcount++;
    }
    else
    {
      $validnid1="NID : ".$nid;
      echo "<br>";
    }

    if (empty($refno))
    {
      $validrefno= "Reference number cannot be empty!";
      $errcount++;
    }
    else
    {
      $validrefno1="Reference Number : ".$refno;
      echo "<br>";
    }

    if (empty($workxp))
    {
      $validworkxp= "This field cannot be empty!";
      $errcount++;
    }
    else
    {
      $validworkxp1="Work Experience : ".$workxp;
      echo "<br>";
    }

    if (empty($dob))
    {
      $validdob= "Date of birth cannot be empty!";
      $errcount++;
    }
    else
    {
      $validdob1="Date of birth : ".$dob;
      echo "<br>";
    }

    if (isset($gender))
    {
      $validgender1="Gender :" .$gender;
    }
    else
    {
      $validgender= "This field cannot be empty!";
       echo "<br>";
    }


    if(!isset($checkbox))
    {
      $validcheckbox="Please fill up all the requirements!";
      $errcount++;
    }

    if($errcount === 0) {
        echo "User saved";
        $user = new User('admin', array
        (
          'fname' => $fname,
          'lname' => $lname,
          'email' => $email,
          'pwd' => $pwd,
          'phone' => $pno,
          'NID' => $nid,
          'dob' => $dob,
          'gender' => $gender,
          'address' => '',
          'refno'=>$refno,
          'workexp'=>$workxp,
          'image' => '',
         ));
      $user->save();
      header("Location: http://localhost/webtechProject");
    }
    else {
      echo "Error exists";

      echo $validfname;
      echo $validlname;
      echo $validemail;
      echo $validpwd;
      echo $validcpwd;
      echo $validpno;
      echo $validnid;
      echo $validrefno;
      echo $validworkxp;
      echo $validdob;
      echo $validgender;
      echo $validcheckbox;
    }






}
    

?>