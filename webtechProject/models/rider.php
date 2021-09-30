<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/db-connect.php';

    function insertRider($fname, $lname, $email, $pwd, $phone, $NID, $dob, $gender, $address, $startingtime, $endingtime, $vehicle, $image) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO rider (firstname, lastname, email, password, phone, NID, dob, gender, address, startingtime, endingtime, vehicle, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        print_r($conn->error_list);        
        $stmt->bind_param('sssssssssssss', $fname, $lname, $email, $pwd, $phone, $NID, $dob, $gender, $address, $startingtime, $endingtime, $vehicle, $image);
        $res = $stmt->execute();
        if(!$res) {
            return 'User is failed to insert\n'.$conn->error;
            //return false;
        } else {
            return true;
        }
    }
    function getRiders() {
        global $conn;
        $users = array();

        $res = $conn->query("SELECT * FROM rider");

        while ($row = $res->fetch_assoc()) {
            array_push($users, $row);
        }
        return $users;
    }
    function getRiderWithEmail($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM rider WHERE email='$email'");
        return $res->fetch_assoc();
    }
    function getRiderWithId($id) {
        global $conn;
        $res = $conn->query("SELECT * FROM rider WHERE user_id='$id'");
        return $res->fetch_assoc();
    }
    function searchRider($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM rider WHERE email LIKE '$email%'");
        $users = array();
        while($row = $res->fetch_assoc()) {
            $row['role'] = 'rider';
            array_push($users, $row);
        }
        return $users;
    }
    function editRider($email, $prop, $value) {
        global $conn;
        $stmt = $conn->prepare("UPDATE rider SET $prop=? WHERE email=?");
        $stmt->bind_param('ss', $value, $email);
        $res = $stmt->execute();
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }