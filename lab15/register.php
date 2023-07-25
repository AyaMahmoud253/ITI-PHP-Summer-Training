<?php
require_once "Database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);

    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $roomNumber = $_POST["room_number"];
    $profileImage = $_FILES["profile_image"];

    $result = $user->registerUser($username, $password, $email, $roomNumber, $profileImage);

    if ($result === true) {
        // Registration successful
        header("Location: view_users.php");
    } else {
        // Registration failed
        echo $result;
    }
}
?>
