<?php
class Database {
    private $servername = "127.0.0.1";
    private $port = 3307;
    private $username = "root";
    private $password = "";
    private $dbName = "my_registration_db";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName, $this->port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($username, $password, $email, $roomNumber, $profileImage) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Handle the image upload
        $targetDir = "uploads/"; // The directory where you want to store the uploaded images
        $fileName = basename($profileImage["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowedTypes = array('png', 'jpg', 'jpeg');
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($profileImage["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO users (username, password, email, room_number, profile_image) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);

                // Bind parameters and execute the statement
                $stmt->bind_param("sssis", $username, $hashedPassword, $email, $roomNumber, $fileName);

                if ($stmt->execute()) {
                    // Registration successful
                    return true;
                } else {
                    // Registration failed
                    return "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                return "Error uploading the image.";
            }
        } else {
            return "Invalid file type. Only PNG, JPG, and JPEG files are allowed.";
        }
    }

    public function getAllUsers() {
        $sql = "SELECT username, email, room_number, profile_image ,id FROM users";
        $result = $this->conn->query($sql);

        $users = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }
    public function getUserById($user_id)
    {
        $user_id = mysqli_real_escape_string($this->conn, $user_id);
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Function to update user information
    public function updateUser($user_id, $newUsername, $newEmail, $newRoomNumber)
    {
        $user_id = mysqli_real_escape_string($this->conn, $user_id);
        $newUsername = mysqli_real_escape_string($this->conn, $newUsername);
        $newEmail = mysqli_real_escape_string($this->conn, $newEmail);
        $newRoomNumber = mysqli_real_escape_string($this->conn, $newRoomNumber);

        $sql = "UPDATE users SET username = '$newUsername', email = '$newEmail', room_number = '$newRoomNumber' WHERE id = '$user_id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Function to delete user by ID
    public function deleteUser($user_id)
    {
        $user_id = mysqli_real_escape_string($this->conn, $user_id);

        $sql = "DELETE FROM users WHERE id = '$user_id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
