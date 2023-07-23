<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted for registration
    if (isset($_POST['register'])) {
        // Get the form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $room_number = $_POST['room_number'];

         // File handling for the profile image
        $profile_image = $_FILES['profile_image']['name'];
        $profile_image_tmp = $_FILES['profile_image']['tmp_name'];
        $upload_directory = "uploads/";

        // Generate a unique filename using the current timestamp
        $timestamp = time(); // Get the current Unix timestamp
        $profile_image_filename = $timestamp . "_" . $profile_image;

        // Check if the uploaded file has a valid extension (PNG or JPG)
        $valid_extensions = array('png', 'jpg', 'jpeg');
        $file_extension = strtolower(pathinfo($profile_image, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $valid_extensions)) {
            echo '<script>alert("Invalid file format! Only PNG and JPG files are allowed.");</script>';
            exit();
        }
         // Validate email using regex pattern
         $email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
         if (!preg_match($email_pattern, $email)) {
             echo "Invalid email format!";
             exit();
         }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format!";
            exit();
        }
        // Validate the password
        if (!preg_match('/^[a-z_]{8}$/', $password)) {
            echo "Invalid password! Password must be 8 characters long and contain only lowercase letters and underscores.";
            exit();
        }


        move_uploaded_file($profile_image_tmp, $upload_directory . $profile_image_filename);


        // Validate and save data to a file (user_data.txt)
        if ($password === $confirm_password) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $data = "Username: " . $username . "\n";
            $data .= "Hashed Password: " . $hashed_password . "\n";
            $data .= "Email: " . $email . "\n";
            $data .= "Room Number: " . $room_number . "\n";
            $data .= "Profile Image: " . $upload_directory . $profile_image_filename . "\n";

            // Save data to a file
            $file = fopen("user_data.txt", "a");
            fwrite($file, $data);
            fclose($file);

            // Redirect to the success page
            header("Location: login.php");
            exit();
        } else {
            echo "Password and Confirm Password do not match!";
        }
    } elseif (isset($_POST['reset'])) {
        // Handle form reset
        // Redirect to the same page to clear form data
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
