<?php
// Check if the user ID is provided in the URL parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "Database.php";

    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);

    $user_id = $_GET['id'];
    $result = $user->deleteUser($user_id);

    if ($result) {
        header("Location: view_users.php");
        exit();
    } else {
        echo "Error deleting the user.";
    }
} else {
    header("Location: view_users.php");
    exit();
}
?>
