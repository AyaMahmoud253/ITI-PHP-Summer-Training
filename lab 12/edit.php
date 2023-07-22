<?php
// Function to read the data from file.txt and convert it into a PHP array
function readDataFromFile() {
    $fileContents = file_get_contents('file.txt');
    $lines = explode("\n", $fileContents);
    $users = array_map(function($line) {
        return explode(",", $line);
    }, $lines);
    return $users;
}

// Function to write the data back to file.txt
function writeDataToFile($users) {
    $fileContents = implode("\n", array_map(function($user) {
        return implode(",", $user);
    }, $users));
    file_put_contents('file.txt', $fileContents);
}

// Function to find the user data by username
function findUserByUsername($users, $username) {
    foreach ($users as $user) {
        if ($user[6] === $username) { 
            return $user;
        }
    }
    return null;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editUser"])) {
    // Get the edited data from the form
    $editedUsername = $_POST["username"];
    $editedPassword = $_POST["password"];
    $editedFirstName = $_POST["firstname"];
    $editedLastName = $_POST["lastname"];
    $editedAddress = $_POST["address"];
    $editedCountry = $_POST["country"];
    $editedGender = $_POST["gender"];
    $editedSkills = isset($_POST["languages"]) ? implode(", ", $_POST["languages"]) : "";
    $editedDepartment = $_POST["department"];
    $users = readDataFromFile();
    $userToUpdateIndex = -1;

    // Find the index of the user with the specified username
    foreach ($users as $index => $user) {
        if ($user[6] === $editedUsername) {
            $userToUpdateIndex = $index;
            break;
        }
    }

    // If the user with the specified username is found, update the data
    if ($userToUpdateIndex !== -1) {
        // Update the user data
        $users[$userToUpdateIndex][0] = $editedFirstName;
        $users[$userToUpdateIndex][1] = $editedLastName;
        $users[$userToUpdateIndex][2] = $editedAddress;
        $users[$userToUpdateIndex][3] = $editedCountry;
        $users[$userToUpdateIndex][4] = $editedGender;
        $users[$userToUpdateIndex][5] = $editedSkills;
        $users[$userToUpdateIndex][6] = $editedUsername;
        $users[$userToUpdateIndex][7] = $editedPassword;
        $users[$userToUpdateIndex][8] = $editedDepartment;

        writeDataToFile($users);

        // Redirect back to the main page after saving changes
        header("Location: file.php");
        exit();
    }
} else {
    // Get the username from the query parameter, assuming the URL is like edit.php?username=user1
    if (isset($_GET["username"])) {
        $usernameToEdit = $_GET["username"];
        $users = readDataFromFile();
        $userToEdit = findUserByUsername($users, $usernameToEdit);

        if (!$userToEdit) {
            // If the user with the specified username is not found, redirect to the main page
            header("Location: file.php");
            exit();
        }
    } else {
        // If the username is not provided in the URL, redirect to the main page
        header("Location: file.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User Data</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php if (isset($userToEdit)) : ?>
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $userToEdit[0]; ?>" required><br>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $userToEdit[1]; ?>" required><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" cols="50" required><?php echo $userToEdit[2]; ?></textarea>
            <br>

            <label for="country">Country:</label>
            <select id="country" name="country" required>
                <option value="USA" <?php if ($userToEdit[3] === 'USA') echo 'selected'; ?>>USA</option>
                <option value="UK" <?php if ($userToEdit[3] === 'UK') echo 'selected'; ?>>UK</option>
            </select><br>

            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" <?php if ($userToEdit[4] === 'Male') echo 'checked'; ?> required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" <?php if ($userToEdit[4] === 'Female') echo 'checked'; ?> required>
            <label for="female">Female</label><br>

            <label>Skills:</label>
        <br>
        <input type="checkbox" id="php" name="languages[]" value="PHP" <?php if (strpos($userToEdit[5], 'PHP') !== false) echo 'checked'; ?>>
        <label for="php">PHP</label>

        <input type="checkbox" id="mysql" name="languages[]" value="MySQL" <?php if (strpos($userToEdit[5], 'MySQL') !== false) echo 'checked'; ?>>
        <label for="mysql">MySQL</label>

        <input type="checkbox" id="js" name="languages[]" value="JavaScript" <?php if (strpos($userToEdit[5], 'JavaScript') !== false) echo 'checked'; ?>>
        <label for="js">JavaScript</label>

        <input type="checkbox" id="java" name="languages[]" value="Java" <?php if (strpos($userToEdit[5], 'Java') !== false) echo 'checked'; ?>>
        <label for="java">Java</label>
        <br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $userToEdit[6]; ?>" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $userToEdit[7]; ?>" required><br>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" value="<?php echo $userToEdit[8]; ?>" required><br>

            <input type="hidden" name="editUser" value="true">

            <input type="submit" value="Save Changes">
        <?php else : ?>
            <p>User not found.</p>
        <?php endif; ?>
    </form>
</body>
</html>
