<?php $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject/'; ?>

<?php include $_SERVER['DOCUMENT_ROOT']."/webtechProject/controllers/handlers/handleAdminSignup.php"; ?>  
<html>
<head>

<link type="text/css" rel="stylesheet" href="<?php echo $path.'utils/css/adminSignup.css' ?>">



<h2> Sign Up For Admin</h2>
</head>


<body>



<div class="container">
<form action="<?php echo $path.'controllers/handlers/handleAdminSignup.php'; ?>" method="post" name="myform">
<h1 class="p4">Sign Up</h1>
<p class="p3">Please fill this form to create an account!</p>
<hr class="hr">

    <div class="center">
        
        <div >
            <input type="text" name="fname" id="fname" placeholder="First Name" > <br> <span class="valid2" id="er_fname"></span>  <span class="valid"><?php echo $validfname;?> </span>
        </div>
            
        <div>
            <input type="text" name="lname" id="lname" placeholder="Last Name"> <br><span class="valid2" id="er_lname"></span>  <span class="valid"><?php echo $validlname;?></span>
        </div>

        <div>
            <input type="text" name="email" id="email" placeholder="E-mail">  <br><span class="valid2" id="er_email"> </span> <span class="valid"><?php echo $validemail;?></span>
        </div>

        <div>
        <input type="password" name="pwd" id="pwd" placeholder="Password" > <br><span class="valid2" id="er_pwd"></span> <span class="valid"><?php echo $validpwd;?></span>
        </div>

        <div>
            <input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password" > <br><span class="valid2" id="er_cpwd"></span> <span class="valid"><?php echo $validcpwd;?></span>
        </div>

        <div>
        <input type="text" name="pno" id="pno" placeholder="Phone Number"> <br><span class="valid2" id="er_pno"></span> <span class="valid"><?php echo $validpno;?></span>
        </div>

        
        <div>
            <input type="text" name="nid" id="nid" placeholder="National ID" > <br><span class="valid2" id="er_nid"></span> <span class="valid"><?php echo $validnid;?></span>
        </div>

        <div>
        <input type="text" name="refno" id="refno" placeholder="Reference Number"  > <br><span class="valid2" id="er_refno"></span> <span class="valid"><?php echo $validrefno;?></span>
        </div>

        <div>
        <input type="text" name="workxp" id="workxp" placeholder="Work Experience "  class="tc2" ><br> <span class="valid2" id="er_workxp"></span> <span class="valid"><?php echo $validworkxp;?></span>
        </div>

        <div>
        <input type="date" name="dob" id="dob" value="Date of birth" class="dob"> <br><span class="valid2" id="er_dob"></span> <span class="valid"><?php echo $validdob;?></span>
        </div>

        
       <div>
       <div class="gender2"><div class="gender"> <label for="gender" >   Gender:</label>
                <input type="radio" id="male" name="gender" value="male" >
                <label for="male" class="gender">Male</label>
                <input type="radio" id="female" name="gender" value="female" >
                <label for="female" class="gender">Female</label>
                <input type="radio" id="other" name="gender" value="other" >
                <label for="other" class="gender">Other</label></div></div>
                <br>
                <span class="valid2" id="er_gender"></span> <span class="valid"><?php echo $validgender;?></span>
       </div>


        <div>
        <input type="checkbox" name="box" id="box" oninput="checkbox();">  <label class="p2" for="box">I accept the <a href="" class="underR">Terms of Use</a>  & <a href=""class="underR">Privacy Policy</a> . </label><br><span class="valid2" id="er_box"></span> <span class="valid"><?php echo $validcheckbox; ?></span>
        </div>

        <div>
        <input type="submit" name="submit" value="Sign Up">
        </div>
        
        
    </div>

</form>

</div>
<p class="p5">Already have an account? <a href="" class="underR">Login here.</a> </p>





<!-- <?php

echo "<h2>All Inputs:</h2>";
echo $validfname1;
echo "<br>";
echo $validlname1;
echo "<br>";
echo $validemail1;
echo "<br>";
echo $validpwd1;
echo "<br>";
echo $validcpwd1;
echo "<br>";
echo $validpno1;
echo "<br>";
echo $validnid1;
echo "<br>";
echo $validrefno1;
echo "<br>";
echo $validworkxp1;
echo "<br>";
echo $validdob1;
echo "<br>";
echo $validgender1;
echo "<br>";


?> -->
<script src="control/validation.js"></script>

</body>
</html>