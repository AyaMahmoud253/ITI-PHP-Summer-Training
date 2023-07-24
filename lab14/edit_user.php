<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "connect.php";
    
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        header("Location: view_users.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
        $newUsername = $_POST["username"];
        $newEmail = $_POST["email"];
        $newRoomNumber = $_POST["room_number"];

        $sql = "UPDATE users SET username = '$newUsername', email = '$newEmail', room_number = '$newRoomNumber' WHERE id = '$user_id'";
        if ($conn->query($sql) === TRUE) {
            header("Location: view_users.php");
            exit;
        } else {
            // Update failed
            echo "Error: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
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
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <select class="form-control" id="room_number" name="room_number">
                <option value="1" <?php if ($user['room_number'] == 1) echo 'selected'; ?>>Room 1</option>
                <option value="2" <?php if ($user['room_number'] == 2) echo 'selected'; ?>>Room 2</option>
                <option value="3" <?php if ($user['room_number'] == 3) echo 'selected'; ?>>Room 3</option>
                <option value="4" <?php if ($user['room_number'] == 4) echo 'selected'; ?>>Room 4</option>
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
