<?php
$host = "localhost"; // or 127.0.0.1
$username = "root";        
$password = "";           
$dbname = "login";        

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection faild to db " . $conn->connect_error);
}
echo "connection sucusses";

?>