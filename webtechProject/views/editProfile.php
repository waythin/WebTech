<?php 
include 'header.php'; 
?>
<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
<h2>Edit Your Profile</h2>
<fieldset>
    Edit Profile<br>
<center>
<table>
    <tr>
        <td>
            <?php if($_SESSION['image'] == '') {
                echo '<img height="120" width="100" src="../image/static/user.png" alt="">';
            } else {
                echo '<img height="120" width="100" src="'.'../'.$_SESSION['image'].'" alt="">';
            } ?>
        </td>
        <img src="" alt="">
    </tr>
    <form action="http://localhost/webtechProject/controllers/handlers/handleEditProfile.php" method="POST">
        <tr>
            <td>Name</td>
            <td><input type = "text" id = "name" name="name" value="<?php echo $_SESSION['username']; ?>">
        </tr>
        <tr>
            <td>Location</td>
            <td><input type="text" id="location" name="location" value="<?php echo $_SESSION['location']; ?>">
        </tr>
        <tr>
            <td>Contact No</td>
            <td><input type="text" id="contact_no" name="contact_no" value="<?php echo $_SESSION['contact_no']; ?>">
        </tr>
        <tr>
            <td></td>
            <td><input type = "submit" value = "Update" name="update_profile">
        </tr>
    </form>
</table>
</center>
    </fieldset><br><br>
    <fieldset>
    Change Password<br>
<center>
<table>
    <form action="http://localhost/webtechProject/controllers/handlers/handleChangePassword.php" method="POST">
        <tr>
            <td>Old Password</td>
            <td><input type="password" id="old_pwd" name = "old_pwd">
        </tr>
        <tr>
            <td>New Password</td>
            <td><input type="password" id = "pwd" name = "pwd">
        </tr>
        <tr>
            <td>Reapet Password</td>
            <td><input type="password" id = "cpwd" name = "cpwd">
        </tr>
        <tr>
            <td></td>
            <td><input type = "submit" value = "Update" name="update_password">
        </tr>
    </form>
    <tr>
        <?php if(isset($_GET['wrong'])) echo "Your old password is incorrect";
        if(isset($_GET['format'])) echo 'Password must contain minimum eight characters, at least one letter, one number and one special character';
        if(isset($_GET['match'])) echo 'Both password must match';
        if(isset($_GET['success'])) echo 'Password Changed Successfully'; ?>
    </tr>
</table>
</center>
</fieldset><br><br>
<fieldset>
Profile Picture
<center>
    Select image to upload:
  <form action="http://localhost/webtechProject/controllers/handlers/handleProfilePictureUpload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="profile_picture" id="profile_picture">
    <input type="submit" value="Upload Image" name="upload_profile_picture">
  </form>
  </center>
</fieldset>
<?php include 'footer.php' ?>