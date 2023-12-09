<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Include database connection logic
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatePassword'])) {
    // Retrieve updated password information
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    // Validate password match
    if ($newPassword !== $confirmNewPassword) {
        // Handle password mismatch error (you can display an error message to the user)
        echo "Passwords do not match.";
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $stmt = $conn->prepare("UPDATE Users SET PasswordHash = ? WHERE Username = ?");
    $stmt->bind_param("ss", $hashedPassword, $_SESSION['user']);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the profile page after updating
    header('Location: profile.php');
    exit;
}
?>