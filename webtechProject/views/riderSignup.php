<?php require $_SERVER['DOCUMENT_ROOT']."/webtechProject/controllers/handlers/handleRiderSignup.php"; 
$path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject/';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rider SignUp</title>
        <link rel="stylesheet" href="<?php echo $path.'utils/css/riderSignup.css' ?>">
    </head>
    <body>  
            <div class="background">
            <div class="inside">
                <div class="box">
                    <h1>Sign Up</h1>
                    <h3>Please fill in this form to create an account</h3>
                    <hr>
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        <table>
                            <tr>
                                <td><input type="text" name="firstname" id="firstname" placeholder="First Name"></td>                                
                                <td><input type="text" name="lastname" id="lastname" placeholder="Last Name"></td>
                                

                            </tr>
                            <tr>
                                <td id="fn"><p id="myfirstname"><?php if(isset($_GET['firstname'])) echo 'Firstname must have atleast 3 characters'; ?></p></td>
                                <td id="ln"><p id="mylastname"><?php if(isset($_GET['lastname'])) echo 'Lastname must have atleast 3 characters'; ?></p></td>
                                
                            </tr>
                            <tr>
                                    <td><input type="text" name="email" id="email" placeholder="Email"></td>
                                    <td><input type="text" name="phone" id="phone" placeholder="Phone Number"></td>
                                    
                                </tr>

                                <tr>
                                <td id="em"><p id="myemail"><?php if(isset($_GET['email'])) echo 'Wrong email format'; ?></p></td>
                                <td id="pn"><p id="myphone"><?php if(isset($_GET['phone'])) echo 'Type correct phone number'; ?> </p></td>
                                </tr>

                           
                        </table>

                       

                        <table>
                                
                           

                           
                            <tr>
                                <td><input type="password" name="password" id="password" placeholder="Password"></td>
                                
                            </tr>

                            <tr>
                            <td id="p"><p id="mypassword"><?php if(isset($_GET['password'])) echo 'Password must contain minimum eight characters, at least one letter, one number and one special character'; ?></p></td>
                                
                            </tr>
                            
                            <tr>
                                <td><input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"></td>
                                
                                
                            </tr>
                            <tr>
                            <td id="cp"><p id="mycpassword"><?php if(isset($_GET['cpassword'])) echo 'Both password must match'; ?></p></td>
                                
                            </tr>
                            
                            <tr>
                                <td><input type="text" name="nid" id="nid" placeholder="National ID Card Number"></td>
                                
                            </tr>
                            
                            <tr>
                                <td id="nd"><p id="mynid"><?php if(isset($_GET['nid'])) echo 'Type correct NID'; ?></p></td>
                                
                            </tr>
                            <tr>
                                <td><input type="text" name="address" id="address" placeholder="Address"></td>
                                
                            </tr>
                            
                            <tr>
                                <td id="ad"><p id="myaddress"><?php if(isset($_GET['address'])) echo 'Type your address'; ?></p></td>
                                  
                            </tr>

                            
                           
                        </table>

                        <table>
                                

                                <tr>
                                    <td><label for="gender" id="ngender">Sex</label>
                                    <select name="gender" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </td>
                                    
                                    <td><label for="dob" id="ndob">Dob</label>
                                    <input type="date" name="dob" id="dob"></td>
                                    

                                    

                                    <td><label for="ride" id="sride">Ride</label>
                                    <select name="ride" id="ride">
                                    <option value="bicycle">Bicycle</option>
                                    <option value="motorcycle">Motorcycle</option>
                                </td>
                                
                                </tr>
     
                                
                            </table>
                            <table>

                            <tr><td></td><td id="sdob"><p id="sdob"><?php if(isset($_GET['dob'])) echo 'Select Correct Date of birth'; ?></p></td><td></td> </tr>
                            </table>
                        <table>

                            <tr>
                                

                                <td>
                                    <label for="starttime" id="nstarttime"> Available Time Starts From</label>
                                <input type="time" name="starttime" id="starttime"></td>
                                <td><label for="endtime" id="nendtime">To</label>
                                <input type="time" name="endtime" id="endtime"></td>
                            </tr>
                            </table>
                        <table>

                            <tr>
                                <td></td> <td id="ent"><p id="ent"><?php if(isset($_GET['endtime'])) echo 'Ending time must be bigger'; ?></p></td>
                            </tr>
                            </table>
                        <table>
                            
                            
                            
                            
                            <tr>
                            <td><label for="pic" id="npic">Choose Your Picture:</label>
                                <input type="file" name="pic" id="pic" ></td>
                            </tr>
                           
                            </table>
                        <table>
                            
                            <tr>
                            <td id="pp"><p id="pp"><?php if(isset($_GET['pic'])) echo 'The file type is not allowed'; ?></p></td>
                            
                            
                            
                            

                            <tr>
                                <td><input type="checkbox" name="check" id="check" >I accept the Terms of Use & Privacy Policy</td>
                                
                            </tr>

                            <tr>
                                 <td id="sign"><input type="submit" name="sign_up" id="sign_up" value="Sign Up"></td>
                                <td><p id="mysignup"></p></td>
                            </tr>
                            <tr>
                                <td id="nf">
                                    <?php if(isset($_GET['empty'])) echo 'Please fill up all the fields to sign up'; ?>
                                </td>
                            </tr>
                        </table>
                         
                        
                    </form>
                   
                </div>
                
                <h5 id="already">Already have an account?<a href="">Login here</a></h5>
                </div>
            </div>
            
        
    </body>
</html>
<script src="<?php echo $path.'utils/js/validation/riderSignupval.js'?>"></script>