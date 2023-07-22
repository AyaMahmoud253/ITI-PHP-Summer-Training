<?php

function readDataFromFile() {
    $fileContents = file_get_contents('file.txt');
    $lines = explode("\n", $fileContents);
    $users = array_map(function($line) {
        return explode(",", $line);
    }, $lines);
    return $users;
}

function writeDataToFile($users) {
    $fileContents = implode("\n", array_map(function($user) {
        return implode(",", $user);
    }, $users));
    file_put_contents('file.txt', $fileContents);
}

function isUsernameUnique($users, $username) {
    foreach ($users as $user) {
        if ($user[6] === $username) { 
            return false; // Username is taken
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["deleteUser"])) {
    $users = readDataFromFile();

    $deleteUsername = $_GET["deleteUser"];

    $deleteIndex = -1;
    foreach ($users as $index => $user) {
        if ($user[6] === $deleteUsername) {
            $deleteIndex = $index;
            break;
        }
    }

    if ($deleteIndex !== -1) {
        // Remove the user from the array
        array_splice($users, $deleteIndex, 1);

        // Write the updated data back to the file
        writeDataToFile($users);

        // Redirect back to the file.php page after deletion
        header("Location: file.php");
        exit();
    }
}

// Handle user registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Read current data from the file
    $users = readDataFromFile();

    // Collect new user data from the form
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $skills = isset($_POST["languages"]) ? implode(" ", $_POST["languages"]) : "";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $department = $_POST["department"];
    $securityCode = $_POST["securitycode"];

    // Validate the required fields
    $errors = [];
    if (empty($firstName)) {
        $errors[] = "First Name is required.";
    }

    if (!empty($errors)) {
        // Output the errors as JSON and exit
        header('Content-Type: application/json');
        echo json_encode(['errors' => $errors]);
        exit();
    }

    // Check if the username is unique
    if (isUsernameUnique($users, $username)) {
      
        $newUserData = array($firstName, $lastName, $address, $country, $gender, $skills, $username, $password, $department);
        $users[] = $newUserData;

        writeDataToFile($users);

        // Redirect to the file.php page after successful submission
        header("Location: file.php");
        exit();
    } else {
        // If the username is already taken, show a warning message
        $errors[] = "Username must be unique. Please choose a different username.";
    }
}

$users = readDataFromFile();

function generateTableRows($data, $separator = ', ') {
    $tableContent = "";
    foreach ($data as $row) {
        $tableContent .= "<tr>";
        for ($i = 0; $i < count($row); $i++) {
            if ($i === 5) { // Check if it's the Skills column
                $languages = explode(" ", $row[$i]); // Split the languages using the space separator
                $tableContent .= "<td>" . implode($separator, $languages) . "</td>";
            } else {
                $tableContent .= "<td>" . $row[$i] . "</td>";
            }
        }
        $tableContent .= "<td><a href='edit.php?username=" . $row[6] . "'>Edit</a></td>";
        $tableContent .= "<td><a href='file.php?deleteUser=" . $row[6] . "'>Delete</a></td>"; // Add the Delete link with the username as a parameter
        $tableContent .= "</tr>";
    }
    return $tableContent;
}

$tableContent = generateTableRows($users);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Table</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e8f0fe;
        }
    </style>
</head>
<body>
    <form action="file.php" method="post" onsubmit="return validateForm()">

    </form>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Country</th>
            <th>Gender</th>
            <th>Skills</th>
            <th>Username</th>
            <th>Password</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php echo $tableContent; ?>
    </table>

    
</body>
</html>
