<?php
$filename = 'file.txt';
if (!file_exists($filename)) {
    // Create an empty file if it doesn't exist yet
    file_put_contents($filename, "");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $users = readDataFromFile();

    // Collect new user data from the form
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $skills = implode(" ", $_POST["languages"]);
    $username = $_POST["username"];
    $password = $_POST["password"];
    $department = $_POST["department"];

    // Validate the required fields
    $errors = [];
    if (empty($firstName)) {
        $errors[] = "First Name is required.";
    }

    if (empty($lastName)) {
        $errors[] = "Last Name is required.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (empty($country)) {
        $errors[] = "Country is required.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($_POST["languages"])) {
        $errors[] = "At least one Skill must be selected.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($department)) {
        $errors[] = "Department is required.";
    }

    if ($_POST["securitycode"] !== "#Aya_@") {
        $errors[] = "Invalid Security Code. Please enter the correct security code (#Aya_@).";
    }

    if (!empty($errors)) {
        echo '<script>alert("' . implode("\\n", $errors) . '");</script>';
    } else {
        // Check if the username is unique and not already taken
        if (isUsernameUnique($users, $username)) {
            // If the username is unique, add the new user data to the array
            $newUserData = array($firstName, $lastName, $address, $country, $gender, $skills, $username, $password, $department);
            $users[] = $newUserData;

            // Write the updated data back to the file
            writeDataToFile($users);

            // Redirect to another page after submission (optional)
            header("Location: file.php");
            exit(); // Make sure to stop further execution after redirection
        } else {
            echo '<script>alert("Username must be unique. Please choose a different username.");</script>';
        }
    }
}

function isUsernameUnique($users, $username) {
    foreach ($users as $user) {
        if ($user[6] === $username) {
            return false; // Username is taken
        }
    }
    return true; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <form action="file.php" method="post" onsubmit="return validateForm()">

        <label for="firstname">First Name:</label>
        <br>
        <input type="text" id="firstname" name="firstname" ><br>
        <span id="error-firstname" style="color: red;"></span><br>

        <label for="lastname">Last Name:</label>
        <br>
        <input type="text" id="lastname" name="lastname" ><br>
        <span id="error-lastname" style="color: red;"></span><br>

        <label for="address">Address:</label>
<br>
<textarea id="address" name="address" rows="4" cols="50"></textarea>
<br>
<span id="error-address" style="color: red;"></span>
<br>


        <label for="country">Country:</label>
<br>
<select id="country" name="country">
    <option value="" selected disabled>Select Country</option>
    <option value="USA">USA</option>
    <option value="UK">UK</option>
</select>
<br>
<span id="error-country" style="color: red;"></span>
<br>


        
    <label>Gender:</label>
    <br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label>
    <br>
    <span id="error-gender" style="color: red;"></span>
    <br>

    <label>Skills:</label>
    <br>
    <input type="checkbox" id="php" name="languages[]" value="PHP">
    <label for="php">PHP</label>

    <input type="checkbox" id="mysql" name="languages[]" value="MySQL">
    <label for="mysql">MySQL</label>

    <input type="checkbox" id="js" name="languages[]" value="JS">
    <label for="js">JavaScript</label>

    <input type="checkbox" id="java" name="languages[]" value="Java">
    <label for="java">Java</label>
    <br>
    <span id="error-skills" style="color: red;"></span>
    <br>

        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username" ><br>
        <span id="error-username" style="color: red;"></span><br>

        <label for="password">Password:</label>
        <br>
        <input type="password" id="password" name="password" ><br>
        <span id="error-password" style="color: red;"></span><br>

        <label for="department">Department:</label>
        <br>
        <input type="text" id="department" name="department" ><br>
        <span id="error-department" style="color: red;"></span><br>

        <label for="securitycode">#Aya_@</label>
<br>
<input type="text" id="securitycode" name="securitycode">
<label for="securitycode">Please insert the code above</label>
<br>
<span id="error-securitycode" style="color: red;"></span>


        <br><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>

    <script>
        function validateForm() {
            var isValid = true;

            // Check First Name
            var firstName = document.getElementById("firstname").value;
            if (firstName === "") {
                document.getElementById("error-firstname").innerText = "First Name is required.";
                isValid = false;
            } else {
                document.getElementById("error-firstname").innerText = "";
            }

            // Check Last Name
            var lastName = document.getElementById("lastname").value;
            if (lastName === "") {
                document.getElementById("error-lastname").innerText = "Last Name is required.";
                isValid = false;
            } else {
                document.getElementById("error-lastname").innerText = "";
            }

            // Check Username
            var username = document.getElementById("username").value;
            if (username === "") {
                document.getElementById("error-username").innerText = "Username is required.";
                isValid = false;
            } else {
                document.getElementById("error-username").innerText = "";
            }

            // Check Password
            var password = document.getElementById("password").value;
            if (password === "") {
                document.getElementById("error-password").innerText = "Password is required.";
                isValid = false;
            } else {
                document.getElementById("error-password").innerText = "";
            }

            // Check Department
            var department = document.getElementById("department").value;
            if (department === "") {
                document.getElementById("error-department").innerText = "Department is required.";
                isValid = false;
            } else {
                document.getElementById("error-department").innerText = "";
            }
            var genderElements = document.querySelectorAll('input[name="gender"]');
        var isGenderSelected = Array.from(genderElements).some(input => input.checked);
        if (!isGenderSelected) {
            document.getElementById("error-gender").innerText = "Gender is required.";
            isValid = false;
        } else {
            document.getElementById("error-gender").innerText = "";
        }

        // Check Skills
        var skillsElements = document.querySelectorAll('input[name="languages[]"]');
        var isSkillsSelected = Array.from(skillsElements).some(input => input.checked);
        if (!isSkillsSelected) {
            document.getElementById("error-skills").innerText = "At least one Skill must be selected.";
            isValid = false;
        } else {
            document.getElementById("error-skills").innerText = "";
        }
        var countryElement = document.getElementById("country");
        var selectedCountry = countryElement.value;
        if (selectedCountry === "") {
            document.getElementById("error-country").innerText = "Country is required.";
            isValid = false;
        } else {
            document.getElementById("error-country").innerText = "";
        }
        var addressElement = document.getElementById("address");
        var address = addressElement.value.trim();
        if (address === "") {
            document.getElementById("error-address").innerText = "Address is required.";
            isValid = false;
        } else {
            document.getElementById("error-address").innerText = "";
        }
        var securityCodeElement = document.getElementById("securitycode");
        var securityCode = securityCodeElement.value.trim();
        if (securityCode !== "#Aya_@") {
            document.getElementById("error-securitycode").innerText = "Invalid Security Code. Please enter the correct security code (#Aya_@).";
            isValid = false;
        } else {
            document.getElementById("error-securitycode").innerText = "";
        }


            return isValid;
        }
    </script>
</body>
</html>
