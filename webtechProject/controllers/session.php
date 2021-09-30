<?php 
class Session
{
    public static function create($email) {
        $result = User::getUser($email);
        $user = $result['data'];

        session_start();
        $_SESSION['role'] = $result['role'];
        $_SESSION['fname'] = $user['firstname'];
        $_SESSION['lname'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['dob'] = $user['dob'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['address'] = $user['address'];
        $_SESSION['image'] = $user['image'];

        if($result['role'] === 'admin') {
            $_SESSION['id'] = $user['admin_id'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['NID'] = $user['NID'];
            $_SESSION['refno'] = $user['refno'];
            $_SESSION['workexp'] = $user['workexp'];
        }
        else if($result['role'] === 'manager') {
            $_SESSION['id'] = $user['manager_id'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['NID'] = $user['NID'];
            $_SESSION['education'] = $user['education'];
            $_SESSION['coverletter'] = $user['coverletter'];
        }
        else if($result['role'] === 'rider') {
            $_SESSION['id'] = $user['rider_id'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['NID'] = $user['NID'];
            $_SESSION['startingtime'] = $user['startingtime'];
            $_SESSION['endingtime'] = $user['endingtime'];
            $_SESSION['vehicle'] = $user['vehicle'];
        }
        else if($result['role'] === 'customer') {
            $_SESSION['id'] = $user['customer_id'];
            $_SESSION['favourite_foods'] = $user['favourite_foods'];
        }
    }
    public static function destroy() {
        session_start();
        session_destroy();
    }
}
?>