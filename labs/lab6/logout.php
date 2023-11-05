<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in (you may use your own criteria)
if (isset($_SESSION['user_id'])) {
    // Destroy the session to log the user out
    session_destroy();
    
    // Redirect the user to a thank you page or the home page
    header("Location: thank_you.php"); // You may need to adjust the URL
    exit();
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php"); // You may need to adjust the URL
    exit();
}
?>
