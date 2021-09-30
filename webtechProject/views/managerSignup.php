<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/handlers/handleManagerLogin.php'; 
$path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject/';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Manager Registration Form</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'utils/css/managerLogin.css' ?>">
</head>
<body>
    <div class="header">
        <h2>Manager Registration<h2>
    </div>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <!--disokay validation errors-->
        <!-- First Name -->
        <div class="input-group">
            <label>First Name</label>
            <input type="text" id="firstname" name="firstname">
            <?php if(isset($_GET['firstname'])) echo '<h6>firstname cannot have white spaces and less than 2 characters<h6>'; ?>
            <p id="myfirstname"></p>
            
        </div>
        <!-- Last Name -->
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" id="lastname" name="lastname">
            <?php if(isset($_GET['lastname'])) echo 'lastname cannot have white spaces and less than 2 characters'; ?>
            <p id="mylastname"></p>
        </div>
        <!-- Email -->
        <div class="input-group">
            <label>Email</label>
            <input type="text" id="email" name="email">
            <?php if(isset($_GET['email'])) echo 'Wrong email format'; ?>
            <p id="myemail"></p>
        </div>
        <!-- Phone number -->
        <div class="input-group">
            <label>Phone Number</label>
            <input type="text" id="phonenumber" name="phonenumber">
            <?php if(isset($_GET['phonenumber'])) echo 'contract number invalid'; ?>
            <p id="myphonenumber"></p>
        </div>
        <!-- Date of birth -->
        <div class="input-group">
            <label>Date of Birth</label>
            <input type="date" id="birthday" name="birthday">
            <?php if(isset($_GET['birthday'])) echo 'Birthday required'; ?>
            <p id="mybirthday"></p>
        </div>
        <!-- NID -->
        <div class="input-group">
            <label>NID</label>
            <input type="text" name="nid" id="nid">
            <?php if(isset($_GET['nid'])) echo 'NID required'; ?>
            <p id="mynid"></p>
        </div>
        <!-- Address -->
        <div class="input-group">
            <label>Address</label>
            <input type="text" name="address" id="address">
            <?php if(isset($_GET['address'])) echo 'Address required'; ?>
        </div>
        <!-- Gender -->
        <div class="input-group">
            <table>
                <tr>
                    <td>
                        <label for="gender" id="gender">Gender</label>
                        <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        <?php if(isset($_GET['gender'])) echo 'Gender required'; ?>
                    </td>
                </tr>
            </table>
        </div>
        <!-- Education -->
        <div class="input-group">
            <table>
                <tr>
                    <td>
                        <label for="education" id="education">what is your highest level of education</label>
                        <select name="education" id="education">
                        <option value="associate">Associate degree</option>
                        <option value="college">Some college coursework completed</option>
                        <option value="bachelor">Bachelor's degree</option>
                        <option value="master">Master's degree</option>
                        <?php if(isset($_GET['education'])) echo 'Education required'; ?>
                    </td>
                </tr>
            </table>
        </div>
        <!-- Picture -->
        <div class="input-group">
            <label for="pic" id="npic">Choose Your Picture:</label>
            <input type="file" name="pic" id="pic" >
            <p id="mypic"><?php if(isset($_GET['pic'])) echo 'The file type is not allowed'; ?></p>

        </div>
        <!-- Cover letter -->
        <div class="input-group">
            <label for="cv" id="cv">Drop your Cover Letter:</label>
            <textarea name="cv" rows="5" cols="40"></textarea>
            <?php if(isset($_GET['cv'])) echo 'Field cannot be empty'; ?>
        </div>
        <!-- Password -->
        <div class="input-group">
            <label>Password</label>
            <input type="password" id="password_1" name="password_1">
            <?php if(isset($_GET['password_1'])) echo 'Password must contain minimum eight characters, at least one letter, one number and one special character'; ?>
            <p id="mypassword_1"></p>
        </div>
        <!-- Confirm Password -->
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" id="password_2" name="password_2">
            <?php if(isset($_GET['password_2'])) echo 'Both password must match'; ?>
            <p id="mypassword_2"></p>
        </div>
        <!-- Submit -->
        <div class="input-group">
            <button type="submit" id="submit" name="submit" class="btn">Go</button>
        </div>
        <p>
            Already a member<a href="">Login here</a></h5> 
        </p>

    </form>
    <script src="<?php echo $path.'/utils/js/validation/manager-loginValidation.js' ?>"></script>

</body>
</html>