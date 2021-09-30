<?php 
$dbservername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'webtechProject';

$connection_log = '';

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if($conn->connect_error) {
    die('Failed to connect to database');
} else {
    $connection_log = 'Connected Successfully';
}
