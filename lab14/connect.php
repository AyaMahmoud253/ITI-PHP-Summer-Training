<?php
$servername = "127.0.0.1";
$port = 3307;
$username = "root";
$password = "";
$dbName = "my_registration_db";

$conn = new mysqli($servername, $username, $password, $dbName, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
