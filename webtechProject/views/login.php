<?php include "header.php"; ?>
<center>
    <h1>Login To You Account</h1>
    <form action="http://localhost/webtechProject/controllers/handlers/handleLogin.php" method="POST">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="pwd" placeholder="Password"><br>
        <input type="checkbox" name="remember" value="remember">
        <label for="remember">Remember Me</label><br>
        <input type="submit" name="login" value="login">
    </form>
    <?php if(isset($_GET['loginFailed'])) echo 'Incorrect email/password wrong'; ?>

    <h2>Don't Have an account yet?</h2>
    <h1>Sign up now!</h1>

    <form  method="POST" action="http://localhost/webtechProject/controllers/handlers/handleSignUp.php">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" id="username"></td>
                <td><?php if(isset($_GET['username'])) echo 'Username cannot have white spaces and less than 2 characters'; ?></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" name="email" id="email"></td>
                <td><?php if(isset($_GET['email'])) echo 'Wrong email format'; ?></td>
            </tr>
            <tr>
                <td><label for="contact_no">Contact No:</label></td>
                <td><input type="text" name="contact_no" id="contact_no"></td>
                <td><?php if(isset($_GET['contact'])) echo 'Contact number cannot have less than 3 numbers'; ?></td>
            </tr>
            <tr>
                <td><label for="pwd">Password</label></td>
                <td><input type="password" name="pwd" id="pwd"></td>
                <td><?php if(isset($_GET['pwd'])) echo 'Password must contain minimum eight characters, at least one letter, one number and one special character'; ?></td>
            </tr>
            <tr>
                <td><label for="cpwd">Confirm Password</label></td>
                <td><input type="password" name="cpwd" id="cpwd"></td>
                <td><?php if(isset($_GET['cpwd'])) echo 'Both password must match'; ?></td>
            </tr>
            <tr>
                <td><input type="submit" name="sign_up" value="Sign Up" id="sign_up"></td>
            </tr>
        </table>
        <?php if(isset($_GET['empty'])) echo 'Please fill up all the fields to sign up'; ?>        
        <?php if(isset($_GET['dbError'])) echo 'Unable to insert into database'; ?>
        <?php if(isset($_GET['saved'])) echo 'User successfully created'; ?>         
    </form>
</center>

<script src="../utils/js/validation/login-validation.js"></script>

<?php include "footer.php"; ?>