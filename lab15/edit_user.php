<?php
require_once "Database.php";

// Check if the user ID is provided in the URL parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);

    $user_id = $_GET['id'];
    $user_data = $user->getUserById($user_id);

    if (!$user_data) {
        header("Location: view_users.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
        $newUsername = $_POST["username"];
        $newEmail = $_POST["email"];
        $newRoomNumber = $_POST["room_number"];

        $result = $user->updateUser($user_id, $newUsername, $newEmail, $newRoomNumber);

        if ($result) {
            header("Location: view_users.php");
            exit;
        } else {
            // Update failed
            echo "Error updating user information.";
        }
    }
} else {
    // Redirect to view_users.php if no user ID is provided
    header("Location: view_users.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit User Information</h2>
    <form method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_data['username']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <select class="form-control" id="room_number" name="room_number">
                <option value="1" <?php if ($user_data['room_number'] == 1) echo 'selected'; ?>>Room 1</option>
                <option value="2" <?php if ($user_data['room_number'] == 2) echo 'selected'; ?>>Room 2</option>
                <option value="3" <?php if ($user_data['room_number'] == 3) echo 'selected'; ?>>Room 3</option>
                <option value="4" <?php if ($user_data['room_number'] == 4) echo 'selected'; ?>>Room 4</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <a href="view_users.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
