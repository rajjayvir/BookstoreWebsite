<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form - Validation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Registration Form - Validation</h1>

    <?php

    $servername = 'db.cs.dal.ca';
    $username = 'jraj';
    $password = '8jNysXA9ZQd9ra5XihisAbdYQ';
    $dbname = 'jraj';


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define functions for input validation
    function validateUsername($username)
    {
        if (empty($username)) {
            return "Username is required.";
        } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            return "Invalid username format.";
        }
        return null; // No error
    }

    function validatePassword($password)
    {
        if (empty($password)) {
            return "Password is required.";
        } elseif (strlen($password) < 8) {
            return "Password must be at least 8 characters long.";
        }
        return null; // No error
    }

    function validateConfirmPassword($password, $confirm_password)
    {
        if ($password !== $confirm_password) {
            return "Passwords do not match.";
        }
        return null; // No error
    }

    $username = $password = $confirm_password = "";
    $errors = [];
    $success_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // Validate each input and store any errors
        $errors['username'] = validateUsername($username);
        $errors['password'] = validatePassword($password);
        $errors['confirm_password'] = validateConfirmPassword($password, $confirm_password);

        // Remove null values from the errors array
        $errors = array_filter($errors);

        // If there are no validation errors, process the form data
        if (empty($errors)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Perform database insertion
            $stmt = $conn->prepare("INSERT INTO Users (Username, PasswordHash) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                // Display success message
                $success_message = "Registration successful! Redirecting to login page...";
                header("Refresh: 3; URL=login.php");  // Redirect after 3 seconds
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
    ?>

    <!-- Display validation errors -->
    <?php if (!empty($errors)): ?>
        <div class="error-messages">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>
                        <?php echo $error; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Display success message -->
    <?php if ($success_message): ?>
        <div class="success-message">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <!-- Registration Form -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <br>

        <input type="submit" value="Register">
    </form>

</body>

</html>