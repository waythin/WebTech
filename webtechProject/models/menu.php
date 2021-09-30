<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/db-connect.php';

    function insertMenuItem($title, $subtitle, $desc, $price, $image, $type) {
        global $conn;
        $msg = 'One Menu inserted\n';
        $stmt = $conn->prepare("INSERT INTO Menu (title, subtitle, price, image, type, description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssisss', $title, $subtitle, $price, $image, $type, $desc);
        $res = $stmt->execute();
        if(!$res) {
            return 'Menu is failed to insert\n'.$conn->error;
            //return false;
        } else {
            return true;
        }
        //return $msg;
        
    }
    function getMenuByType($type) {
        global $conn;
        $menus = array();
        $res = $conn->query("SELECT * FROM Menu WHERE type='$type'");
        while($menu = $res->fetch_assoc()) {
            array_push($menus, $menu);
        }
        return $menus;
    }
    function getMenuById($id) {
        global $conn;
        $res = $conn->query("SELECT * FROM Menu WHERE menu_id='$id'");
        $menu = $res->fetch_assoc();
        return $menu;
    }
    function getFullMenu() {
        global $conn;
        $menus = array();
        $res = $conn->query("SELECT * FROM Menu");
        while($menu = $res->fetch_assoc()) {
            array_push($menus, $menu);
        }
        return $menus;
    }
    function getMenu() {
        global $conn;
        $menus = array();
        $res = $conn->query("SELECT * FROM Menu WHERE approved=1");
        while($menu = $res->fetch_assoc()) {
            array_push($menus, $menu);
        }
        return $menus;
    }
    function getUnapprovedMenu() {
        global $conn;
        $menus = array();
        $res = $conn->query("SELECT * FROM Menu WHERE approved=0");
        while($menu = $res->fetch_assoc()) {
            array_push($menus, $menu);
        }
        return $menus;
    }
    function getFeaturedMenu() {
        global $conn;
        $menus = array();
        $res = $conn->query("SELECT * FROM Menu WHERE featured=1");
        while($menu = $res->fetch_assoc()) {
            array_push($menus, $menu);
        }
        return $menus;
    }

?>