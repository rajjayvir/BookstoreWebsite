<?php
// Define functions for input validation
function validateFirstName($first_name) {
    if (empty($first_name)) {
        return "First Name is required.";
    } elseif (!filter_var($first_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]+\s?[a-zA-Z]*$/")))) {
        return "Invalid First Name format.";
    }
    return null; // No error
}

function validateLastName($last_name) {
    if (empty($last_name)) {
        return "Last Name is required.";
    } elseif (!filter_var($last_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z' -]+$/i")))) {
        return "Invalid Last Name format.";
    }
    return null; // No error
}

function validateEmail($email) {
    if (empty($email)) {
        return "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }
    return null; // No error
}

function validatePassword($password) {
    if (empty($password)) {
        return "Password is required.";
    } elseif (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W_]).{12,}$/")))) {
        return "Invalid password format.";
    }
    return null; // No error
}

function validateConfirmPassword($password, $confirm_password) {
    if ($password !== $confirm_password) {
        return "Passwords do not match.";
    }
    return null; // No error
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Initialize an array to store validation errors
    $errors = [];

    // Validate each input and store any errors
    $errors[] = validateFirstName($first_name);
    $errors[] = validateLastName($last_name);
    $errors[] = validateEmail($email);
    $errors[] = validatePassword($password);
    $errors[] = validateConfirmPassword($password, $confirm_password);

    // Remove null values from the errors array
    $errors = array_filter($errors);

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
