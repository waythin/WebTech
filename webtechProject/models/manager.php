<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/db-connect.php';

    function insertManager($fname, $lname, $email, $pwd, $phone, $NID, $dob, $gender, $address, $education, $coverletter, $image) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO manager (firstname, lastname, email, password, phone, NID, dob, gender, address, education, coverletter, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        print_r($conn->error_list);        
        $stmt->bind_param('ssssssssssss', $fname, $lname, $email, $pwd, $phone, $NID, $dob, $gender, $address, $education, $coverletter, $image);
        $res = $stmt->execute();
        if(!$res) {
            return 'User is failed to insert\n'.$conn->error;
            //return false;
        } else {
            return true;
        }
    }
    function getManagers() {
        global $conn;
        $users = array();

        $res = $conn->query("SELECT * FROM manager");

        while ($row = $res->fetch_assoc()) {
            array_push($users, $row);
        }
        return $users;
    }
    function getManagerWithEmail($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM manager WHERE email='$email'");
        return $res->fetch_assoc();
    }
    function getManagerWithId($id) {
        global $conn;
        $res = $conn->query("SELECT * FROM manager WHERE user_id='$id'");
        return $res->fetch_assoc();
    }
    function searchManager($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM manager WHERE email LIKE '$email%'");
        $users = array();
        while($row = $res->fetch_assoc()) {
            $row['role'] = 'manager';
            array_push($users, $row);
        }
        return $users;
    }
    function editManager($email, $prop, $value) {
        global $conn;
        $stmt = $conn->prepare("UPDATE manager SET $prop=? WHERE email=?");
        $stmt->bind_param('ss', $value, $email);
        $res = $stmt->execute();
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }