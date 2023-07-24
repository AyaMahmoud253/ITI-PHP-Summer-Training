<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .registration-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .registration-form label {
            font-weight: 500;
        }

        .registration-form select {
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23343a40" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position-x: 100%;
            background-position-y: 50%;
            padding-right: 30px;
        }

        .registration-form .btn-primary {
            width: 50%;
            
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="registration-form">
        <h2>User Registration Form</h2>
        <form method="post" action="register.php"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="room_number">Choose a room number:</label>
                <select class="form-control" id="room_number" name="room_number">
                    <option value="1">Room 1</option>
                    <option value="2">Room 2</option>
                    <option value="3">Room 3</option>
                    <option value="4">Room 4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="profile_image">Profile Image (PNG or JPG only):</label>
                <input type="file" class="form-control-file" id="profile_image" name="profile_image" accept=".png, .jpg, .jpeg" required>
            </div>
            
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <button type="submit" class="btn btn-secondary" name="reset">Reset</button>

        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
