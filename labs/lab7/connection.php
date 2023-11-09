<?php
$hostname = 'db.cs.dal.ca';
$username = 'jraj';
$password = '8jNysXA9ZQd9ra5XihisAbdYQ';
$database = 'jraj';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Connection established successfully
    echo "Connection to the database works!";
} catch (PDOException $e) {
    // Connection failed, handle the error
    echo "Connection failed: " . $e->getMessage();
}
?>
