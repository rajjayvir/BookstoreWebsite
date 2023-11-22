<?php
// Include database connection logic
// Replace these variables with your actual database credentials
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
            // Redirect to a welcome page or login page
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>