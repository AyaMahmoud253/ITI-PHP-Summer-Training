<?php
session_start(); // Start the PHP session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted for login
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Read the user_data.txt file to check user credentials
        $user_data = file_get_contents("user_data.txt");

        // Search for the user's data in the file based on their username
        if (preg_match("/Username: $username\nHashed Password: (.+)\n/m", $user_data, $matches)) {
            $hashed_password = $matches[1];

            // Verify the entered password against the hashed password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, create a session variable to store the username
                $_SESSION['username'] = $username;

                // Redirect to the welcome page with the username in the query string
                header("Location: show.php?username=" . urlencode($username));
                exit();
            } else {
                // Invalid password, display an error message
                echo "Invalid password. Please try again.";
            }
        } else {
            // User not found, display an error message
            echo "Invalid username. Please try again.";
        }
    }
}
?>
