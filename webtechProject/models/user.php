<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/db-connect.php';

    
    function insertUser($role, $name, $email, $contact_no, $location, $password, $image) {
        
        global $conn;
        $msg = true;

        $res = $conn->query("INSERT INTO Users (role, name, email, contact_no, location, password, image) VALUES ('$role', '$name', '$email', '$contact_no', '$location', '$password', '$image')");

        if(!$res) {
            $msg = false;
            return $msg;
        }
        return $msg;
    }
    function editUser($role, $name, $email, $contact_no, $location, $image) {
        global $conn;
        $msg = true;

        $res = $conn->query("UPDATE Users SET role='$role', name='$name', email='$email', contact_no='$contact_no', location='$location', image='$image' WHERE email='$email'");

        if(!$res) {
            $msg = false;
            return $msg;
        }
        return $msg;
    }
    function getUsers() {
        global $conn;
        $users = array();

        $res = $conn->query("SELECT * FROM Users");

        while ($row = $res->fetch_assoc()) {
            array_push($users, $row);
        }
        return $users;
    }
    function getUserWithEmail($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM Users WHERE email='$email'");
        return $res->fetch_assoc();
    }
    function getUserWithId($id) {
        global $conn;
        $res = $conn->query("SELECT * FROM Users WHERE user_id='$id'");
        return $res->fetch_assoc();
    }
    function getPassword($id) {
        global $conn;
        $res = $conn->query("SELECT password FROM Users WHERE user_id='$id'");
        return $res->fetch_assoc();
    }
    function changePassword($id, $pwd) {
        global $conn;
        $res = $conn->query("UPDATE Users SET password='$pwd' WHERE user_id='$id'");

        if(!$res) {
            return false;
        }
        return true;
    }
    function updateProfilePicture($id, $img) {
        global $conn;
        $res = $conn->query("UPDATE Users SET image='$img' WHERE user_id='$id'");

        if(!$res) {
            return false;
        }
        return true;
    }
    function searchUser($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM Users WHERE email LIKE '$email%'");
        $users = array();
        while($row = $res->fetch_assoc()) {
            array_push($users, $row);
        }
        return $users;
    }
?>