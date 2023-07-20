<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $gender = $_POST["gender"];
        $languages = isset($_POST["languages"]) ? implode(", ", $_POST["languages"]) : "";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $department = $_POST["department"];

        $gender = $_POST["gender"];
        $greeting = ($gender === "male") ? "Mr" : "Miss";

        // Display the personalized greeting and the submitted data
        echo "<h2>Registration Successful</h2>";
        echo "<p>Thanks , $greeting $firstname $lastname, for your registration!</p>";
        echo "<p>Please Review Your Information</p>";
        echo "<p><strong>First Name:</strong> $firstname</p>";
        echo "<p><strong>Last Name:</strong> $lastname</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Country:</strong> $country</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Skills:</strong> $languages</p>";
        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Password:</strong> $password</p>";
        echo "<p><strong>Department:</strong> $department</p>";
    } else {
        echo "<h2>No data submitted.</h2>";
    }
    ?>
</body>
</html>
