<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    
    require_once "connect.php";

    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $roomNumber = $_POST["room_number"];

    
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    

    // Handle the image upload
    $targetDir = "uploads/"; // The directory where you want to store the uploaded images
    $fileName = basename($_FILES["profile_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowedTypes = array('png', 'jpg', 'jpeg');
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO users (username, password, email, room_number, profile_image) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Bind parameters and execute the statement
            $stmt->bind_param("sssis", $username, $hashedPassword, $email, $roomNumber, $fileName);

            if ($stmt->execute()) {
                // Registration successful
                header("Location: view_users.php");
            } else {
                // Registration failed
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error uploading the image.";
        }
    } else {
   
        echo "Invalid file type. Only PNG, JPG, and JPEG files are allowed.";
    }

    // Close the database connection
    $conn->close();
}
?>
