<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/header2.php'; 
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject/';
?>

<div class="auth-container">
    <div class="login">
        <div class="title"><h2>Login</h2></div>
        <form action="http://localhost/webtechProject/controllers/handlers/handleLogin.php" method="POST">
            <input type="text" name="email" id="login-email" placeholder="Email Address">
            <input type="password" name="pwd" id="login-pwd" placeholder="Password">
            <input type="checkbox" name="remember" value="remember">
            <label for="remember">Remember Me</label><br>
            <input type="submit" value="Login" id="login-submit" name="login">
        </form>
    </div>
    <div class="signup">
        <div class="title"><h2>Sign Up</h2></div>
        <form action="http://localhost/webtechProject/controllers/handlers/handleSignUp.php" method="POST">
            <div class="fname">
                <input type="text" placeholder="First Name" name="fname" id="fname">
                <p class="error">
                <?php if(isset($_GET['fname'])) { ?>
                The name must contain more than 1 character & cannot start with number
                <?php } ?>
                </p>
            </div>
            <div class="lname">
                <input type="text" placeholder="Last Name" name="lname" id="lname">
                <p class="error">
                <?php if(isset($_GET['lname'])) { ?>
                Cannot start with number
                <?php } ?>
                </p>
            </div>
            <div class="email">
                <input type="text" placeholder="Email Address" name="email" id="email">
                <p class="error">
                <?php if(isset($_GET['email'])) { 
                    echo 'Looks like wrong email format!';
                 } ?>
                 <?php if(isset($_GET['duplicate'])) { 
                    echo 'This email is already taken!';
                 } ?>
                 </p>
            </div>
            <div class="pwd">
                <input type="password" placeholder="Password" name="pwd" id="pwd">
                <p class="error">
                <?php if(isset($_GET['pwd'])) { ?>
                Passowrd must contain atleast 8 characters including 1 uppercase, 1 lowercase & 1 special character
                <?php } ?>
                </p>
            </div>
            <div class="cpwd">
                <input type="password" placeholder="Confirm Password" name="cpwd" id="cpwd">
                <p class="error">
                <?php if(isset($_GET['cpwd'])) { ?>
                Both password must match
                <?php } ?>
                </p>
            </div>
            <div class="col2">
                <div class="dob">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob">
                    <p class="error">
                    <?php if(isset($_GET['dob'])) { ?>
                    Date of birth is not validation
                    <?php } ?>
                    </p>
                </div>  
                <div class="gender">
                    <input type="radio" name="gender" id="gender" value="male" checked>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="gender" value="other">
                    <label for="other">Other</label>
                </div> 
                
            </div>          
            
            <div class="fav-food">
                <label for="favfood">Please choice some of your favourites: </label>
                <input type="checkbox" name="favfood[]" value="appetiser" id="favfoodAppetiser">Appetiser
                <input type="checkbox" name="favfood[]" value="setmeal" id="favfoodSetMeal">Set Meal
                <input type="checkbox" name="favfood[]" value="dessert" id="favfoodDessert">Dessert
                <input type="checkbox" name="favfood[]" value="drinks" id="favfoodDrinks">Drinks
                <br>
                <p class="error">
                <?php if(isset($_GET['favfood'])) { ?>
                    Please select atleast one favourite type of food of yours
                <?php } ?>
                </p>
            </div>
            
            <input type="submit" value="Sign Up" name="sign_up">
            <p class="error">
            <?php if(isset($_GET['empty'])) { ?>
                Please take your time to fillup all the fields
            <?php } ?>
            </p>
        </form>
    </div>
    <div class="apply">
        <a href="<?php echo $path.'views/adminSignup.php' ?>">
            <div class="apply-button">
                <img src="<?php echo $path.'image/ui/admin.svg' ?>" alt="">
                <p>Request for Admin</p>
            </div>
        </a>
        <a href="<?php echo $path.'views/managerSignup.php' ?>">
            <div class="apply-button">
                <img src="<?php echo $path.'image/ui/manager.svg' ?>" alt="">
                <p>Apply for Manager</p>
            </div>
        </a>
        <a href="<?php echo $path.'views/riderSignup.php' ?>">
            <div class="apply-button">
                <img src="<?php echo $path.'image/ui/rider.svg' ?>" alt="">
                <p>Become A Rider</p>
            </div>
        </a>
    </div>
</div>
<script src="<?php echo $path.'utils/js/routes/getUser.js' ?>"></script>
<script src="<?php echo $path.'utils/js/validation/customer-loginValidation.js' ?>"></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/footer2.php'; ?>