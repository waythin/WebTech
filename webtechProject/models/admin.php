<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/db-connect.php';

    function insertAdmin($fname, $lname, $email, $pwd, $phone, $NID, $dob, $gender, $address, $refno, $workexp, $image) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO admin (firstname, lastname, email, password, phone, NID, dob, gender, address, refno, workexp, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        print_r($conn->error_list);        
        $stmt->bind_param('ssssssssssss', $fname, $lname, $email, $pwd, $phone, $NID, $dob, $gender, $address, $refno, $workexp, $image);
        $res = $stmt->execute();
        if(!$res) {
            return 'User is failed to insert\n'.$conn->error;
            //return false;
        } else {
            return true;
        }
    }
    function getAdmins() {
        global $conn;
        $users = array();

        $res = $conn->query("SELECT * FROM admin");

        while ($row = $res->fetch_assoc()) {
            array_push($users, $row);
        }
        return $users;
    }
    function getAdminWithEmail($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM admin WHERE email='$email'");
        return $res->fetch_assoc();
    }
    function getAdminWithId($id) {
        global $conn;
        $res = $conn->query("SELECT * FROM admin WHERE user_id='$id'");
        return $res->fetch_assoc();
    }
    function searchAdmin($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM admin WHERE email LIKE '$email%'");
        $users = array();
        while($row = $res->fetch_assoc()) {
            $row['role'] = 'admin';
            array_push($users, $row);
        }
        return $users;
    }

    function editAdmin($email, $prop, $value) {
        global $conn;
        $stmt = $conn->prepare("UPDATE admin SET $prop=? WHERE email=?");
        $stmt->bind_param('ss', $value, $email);
        $res = $stmt->execute();
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }
    
