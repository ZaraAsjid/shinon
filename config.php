<?php
 $host = 'localhost'; 
 $db = 'shine'; 
 $user = 'root';
 $pass = '1218';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
?>