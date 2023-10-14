<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Initialize an array to store validation errors
    $errors = [];

    // Validate First Name
    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    } elseif (!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)?$/", $first_name)) {
        $errors[] = "Invalid First Name format.";
    }

    // Validate Last Name
    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    } elseif (!preg_match("/^[a-zA-Z' -]+$/", $last_name)) {
        $errors[] = "Invalid Last Name format.";
    }

    // Validate Email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate Password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&!])[A-Za-z\d@#$%^&!]{12,}$/", $password)) {
        $errors[] = "Invalid password format.";
    }

    // Confirm Password
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // If there are no validation errors, process the form data
    if (empty($errors)) {
        // Perform registration or further processing here
        // For example, insert user data into a database

        // Redirect to a welcome page
        header("Location: welcome.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form - Validation</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file -->
</head>

<body>
    <h1>Registration Form - Validation</h1>
    <?php
    // Display validation errors, if any
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>
    <a href="index.php">Go back to the registration form</a>
</body>

</html>
