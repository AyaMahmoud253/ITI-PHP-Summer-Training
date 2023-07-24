<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>User Data Table</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Room Number</th>
                <th>Profile Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
           require_once "connect.php";

            $sql = "SELECT username, email, room_number, profile_image ,id FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["room_number"] . "</td>";
                    echo "<td><img src='uploads/" . $row["profile_image"] . "' width='100' height='100' alt='Profile Image'></td>";
                    echo "<td>";
                    echo "<a href='edit_user.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a>";
                    echo "<a href='delete_user.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm ml-1'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
