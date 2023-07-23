<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    echo "<h1>Welcome, $username!</h1>";
    echo "<p>Your registration was successful.</p>";

    // Read the user_data.txt file to find the user's data
    $file_path = "user_data.txt";
    $file_content = file_get_contents($file_path);
    $pattern = "/Username: $username\n.*?Profile Image: (.*?)\n/s";
    preg_match($pattern, $file_content, $matches);

    if (isset($matches[1])) {
        $profile_image = trim($matches[1]);
        echo "<h2>Profile Image:</h2>";
        echo "<img src='$profile_image' alt='Profile Image' style='max-width: 300px;'>";
    } else {
        echo "<p>No profile image found for this user.</p>";
    }
} else {
    echo "<h1>Welcome!</h1>";
    echo "<p>There is no user data to display.</p>";
}
?>

</body>
</html>
