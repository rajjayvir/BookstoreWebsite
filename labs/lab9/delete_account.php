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

// Delete the user account
$stmt = $conn->prepare("DELETE FROM Users WHERE Username = ?");
$stmt->bind_param("s", $_SESSION['user']);
$stmt->execute();
$stmt->close();

// Log the user out and redirect to the login page
session_destroy();
header('Location: login.php');
exit;
?>