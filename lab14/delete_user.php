<?php
// Check if the user ID is provided in the URL parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "connect.php";

    $user_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM users WHERE id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_users.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: view_users.php");
    exit;
}
?>
