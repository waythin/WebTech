<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/db-connect.php';

    function insertCustomer($fname, $lname, $email, $pwd, $dob, $gender, $address, $favourite_foods, $image) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO customer (firstname, lastname, email, password, dob, gender, address, favourite_foods, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        print_r($conn->error_list);        
        $stmt->bind_param('sssssssss', $fname, $lname, $email, $pwd, $dob, $gender, $address, $favourite_foods, $image);
        $res = $stmt->execute();
        if(!$res) {
            return 'User is failed to insert\n'.$conn->error;
            //return false;
        } else {
            return true;
        }
    }
    function getCustomer() {
        global $conn;
        $users = array();

        $res = $conn->query("SELECT * FROM customer");

        while ($row = $res->fetch_assoc()) {
            array_push($users, $row);
        }
        return $users;
    }
    function getCustomerWithEmail($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM customer WHERE email='$email'");
        return $res->fetch_assoc();
    }
    function getCustomerWithId($id) {
        global $conn;
        $res = $conn->query("SELECT * FROM customer WHERE user_id='$id'");
        return $res->fetch_assoc();
    }
    function searchCustomer($email) {
        global $conn;
        $res = $conn->query("SELECT * FROM customer WHERE email LIKE '$email%'");
        $users = array();
        while($row = $res->fetch_assoc()) {
            $row['role'] = 'customer';
            array_push($users, $row);
        }
        return $users;
    }
    function editCustomer($email, $prop, $value) {
        global $conn;
        $stmt = $conn->prepare("UPDATE customer SET $prop=? WHERE email=?");
        $stmt->bind_param('ss', $value, $email);
        $res = $stmt->execute();
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }