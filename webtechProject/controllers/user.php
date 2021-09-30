<?php
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/user.php';
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/admin.php';
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/manager.php';
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/rider.php';
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/customer.php';
class User {
    // protected $role;
    // protected $name;
    // protected $email;
    // protected $contact_no;
    // public $location;
    // protected $password;
    // protected $image;
    // public $error;
    protected $info = array();
    protected $role;
    public $error;

    function __construct($role, $info) {
        $this->role = $role;
        $this->info['fname'] = $info['fname'];
        $this->info['lname'] = $info['lname'];
        $this->info['email'] = $info['email'];
        $this->info['pwd'] = $info['pwd'];        
        $this->info['dob'] = $info['dob'];
        $this->info['gender'] = $info['gender'];
        $this->info['address'] = $info['address'];
        $this->info['image'] = $info['image'];

        if($role === 'admin') {   
            $this->info['phone'] = $info['phone'];
            $this->info['NID'] = $info['NID'];         
            $this->info['refno'] = $info['refno'];
            $this->info['workexp'] = $info['workexp'];  
        }
        else if($role === 'manager') {
            $this->info['phone'] = $info['phone'];
            $this->info['NID'] = $info['NID'];
            $this->info['education'] = $info['education'];
            $this->info['coverletter'] = $info['coverletter'];
        }
        else if($role === 'rider') {
            $this->info['phone'] = $info['phone'];
            $this->info['NID'] = $info['NID'];
            $this->info['startingtime'] = $info['startingtime'];
            $this->info['endingtime'] = $info['endingtime'];
            $this->info['vehicle'] = $info['vehicle'];
        }
        else if($role === 'customer') {
            $this->info['favourite_foods'] = $info['favourite_foods'];
        }
    }
    public function save() {
        // $msg = insertUser($this->role, $this->name, $this->email, $this->contact_no, $this->location, $this->password, $this->image);
        // return $msg;
        if($this->role === 'admin') {
            $msg = insertAdmin($this->info['fname'], $this->info['lname'], $this->info['email'], $this->info['pwd'],$this->info['phone'], $this->info['NID'], $this->info['dob'], $this->info['gender'], $this->info['address'], $this->info['refno'], $this->info['workexp'], $this->info['image']);

            return $msg;
        } else if($this->role === 'manager') {
            $msg = insertManager($this->info['fname'], $this->info['lname'], $this->info['email'], $this->info['pwd'],$this->info['phone'], $this->info['NID'], $this->info['dob'], $this->info['gender'], $this->info['address'], $this->info['education'], $this->info['coverletter'], $this->info['image']);

            return $msg;
        } else if($this->role === 'rider') {
            $msg = insertRider($this->info['fname'], $this->info['lname'], $this->info['email'], $this->info['pwd'],$this->info['phone'], $this->info['NID'], $this->info['dob'], $this->info['gender'], $this->info['address'], $this->info['startingtime'], $this->info['endingtime'], $this->info['vehicle'], $this->info['image']);
        } else if($this->role === 'customer') {
            $msg = insertCustomer($this->info['fname'], $this->info['lname'], $this->info['email'], $this->info['pwd'], $this->info['dob'], $this->info['gender'], $this->info['address'], $this->info['favourite_foods'], $this->info['image']);
        } else {
            echo 'Failed to insert';
            return false;
        }
    }
    public function edit($role, $name, $email, $contact_no, $location, $image) {
        $msg = editUser($role, $name, $email, $contact_no, $location, $image);
        return $msg;
    }
    public static function getUsers() {
        return getUsers();
    }
    public static function getUser($email) {
        $user = getAdminWithEmail($email);
        if($user !== null) {
            return array('role' => 'admin', 'data' => $user);
        }
        $user = getManagerWithEmail($email);
        if($user !== null) {
            return array('role' => 'manager', 'data' => $user);
        }
        $user = getRiderWithEmail($email);
        if($user !== null) {
            return array('role' => 'rider', 'data' => $user);
        }
        $user = getCustomerWithEmail($email);
        if($user !== null) {
            return array('role' => 'customer', 'data' => $user);
        }
        return null;
    }
    public static function getUserWithId($id) {
        $user = getAdminWithId($id);
        if($user !== null) {
            return array('role' => 'admin', 'data' => $user);
        }
        $user = getManagerWithId($id);
        if($user !== null) {
            return array('role' => 'manager', 'data' => $user);
        }
        $user = getRiderWithId($id);
        if($user !== null) {
            return array('role' => 'rider', 'data' => $user);
        }
        $user = getCustomerWithId($id);
        if($user !== null) {
            return array('role' => 'customer', 'data' => $user);
        }
        return null;
    }
    public static function checkUserPassword($id, $pwd) {
        $user = getPassword($id);
        if($pwd === $user['password']) {
            return true;
        } else {
            return false;
        }
    }
    public static function changePassword($id, $pwd) {
        return changePassword($id, $pwd);
    }
    public static function updateProfilePicture($id, $img) {
        return updateProfilePicture($id, $img);
    }
    public static function searchUser($email) {
        $users = array();
        $results = array();
        $results[0] = searchAdmin($email);
        $results[1] = searchManager($email);
        $results[2] = searchManager($email);
        $results[3] = searchCustomer($email);

        foreach($results as $result) {
            foreach($result as $user) {
                array_push($users, $user);
            }
        }

        return $users;
    }
    public static function editUser($role, $email, $info) {
        if($role === 'admin') {
            if(array_key_exists('fname', $info)) {
                editAdmin($email, 'firstname', $info['fname']);
            }
            if(array_key_exists('lname', $info)) {
                editAdmin($email, 'lastname', $info['lname']);
            }
            if(array_key_exists('pwd', $info)) {
                editAdmin($email, 'password', $info['pwd']);
            }
            if(array_key_exists('gender', $info)) {
                editAdmin($email, 'gender', $info['gender']);
            }
            if(array_key_exists('dob', $info)) {
                editAdmin($email, 'dob', $info['dob']);
            }
            if(array_key_exists('address', $info)) {
                editAdmin($email, 'address', $info['address']);
            }
            if(array_key_exists('image', $info)) {
                editAdmin($email, 'image', $info['image']);
            }
            if(array_key_exists('NID', $info)) {
                editAdmin($email, 'NID', $info['NID']);
            }
            if(array_key_exists('phone', $info)) {
                editAdmin($email, 'phone', $info['phone']);
            }
            
            if(array_key_exists('refno', $info)) {
                editAdmin($email, 'refno', $info['refno']);
            }
            if(array_key_exists('workexp', $info)) {
                editAdmin($email, 'workexp', $info['workexp']);
            }            
        }
        if($role === 'manager') {
            if(array_key_exists('fname', $info)) {
                editManager($email, 'firstname', $info['fname']);
            }
            if(array_key_exists('lname', $info)) {
                editManager($email, 'lastname', $info['lname']);
            }
            if(array_key_exists('pwd', $info)) {
                editManager($email, 'password', $info['pwd']);
            }
            if(array_key_exists('gender', $info)) {
                editManager($email, 'gender', $info['gender']);
            }
            if(array_key_exists('dob', $info)) {
                editManager($email, 'dob', $info['dob']);
            }
            if(array_key_exists('address', $info)) {
                editManager($email, 'address', $info['address']);
            }
            if(array_key_exists('image', $info)) {
                editManager($email, 'image', $info['image']);
            }
            if(array_key_exists('NID', $info)) {
                editManager($email, 'NID', $info['NID']);
            }
            if(array_key_exists('phone', $info)) {
                editManager($email, 'phone', $info['phone']);
            }
            if(array_key_exists('education', $info)) {
                editManager($email, 'education', $info['education']);
            }
            if(array_key_exists('coverletter', $info)) {
                editManager($email, 'coverletter', $info['coverletter']);
            }
        }
        if($role === 'rider') {
            if(array_key_exists('fname', $info)) {
                editRider($email, 'firstname', $info['fname']);
            }
            if(array_key_exists('lname', $info)) {
                editRider($email, 'lastname', $info['lname']);
            }
            if(array_key_exists('pwd', $info)) {
                editRider($email, 'password', $info['pwd']);
            }
            if(array_key_exists('gender', $info)) {
                editRider($email, 'gender', $info['gender']);
            }
            if(array_key_exists('dob', $info)) {
                editRider($email, 'dob', $info['dob']);
            }
            if(array_key_exists('address', $info)) {
                editRider($email, 'address', $info['address']);
            }
            if(array_key_exists('image', $info)) {
                editRider($email, 'image', $info['image']);
            }
            if(array_key_exists('NID', $info)) {
                editRider($email, 'NID', $info['NID']);
            }
            if(array_key_exists('phone', $info)) {
                editRider($email, 'phone', $info['phone']);
            }
            if(array_key_exists('startingtime', $info)) {
                editRider($email, 'startingtime', $info['startingtime']);
            }
            if(array_key_exists('endingtime', $info)) {
                editRider($email, 'endingtime', $info['endingtime']);
            }
            if(array_key_exists('vehicle', $info)) {
                editRider($email, 'vehicle', $info['vehicle']);
            }
        }
        if($role === 'customer') {
            if(array_key_exists('fname', $info)) {
                editCustomer($email, 'firstname', $info['fname']);
            }
            if(array_key_exists('lname', $info)) {
                editCustomer($email, 'lastname', $info['lname']);
            }
            if(array_key_exists('pwd', $info)) {
                editCustomer($email, 'password', $info['pwd']);
            }
            if(array_key_exists('gender', $info)) {
                editCustomer($email, 'gender', $info['gender']);
            }
            if(array_key_exists('dob', $info)) {
                editCustomer($email, 'dob', $info['dob']);
            }
            if(array_key_exists('address', $info)) {
                editCustomer($email, 'address', $info['address']);
            }
            if(array_key_exists('image', $info)) {
                editCustomer($email, 'image', $info['image']);
            }
            if(array_key_exists('favourite_foods', $info)) {
                editCustomer($email, 'favourite_foods', $info['favourite_foods']);
            }
        }
    }
    public static function approveUser($role, $email) {
        if($role === 'admin') {
            editAdmin($email, 'approved', 1);
        }
    }
}


?>

