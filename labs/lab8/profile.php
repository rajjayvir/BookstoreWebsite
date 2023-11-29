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

// Fetch user data from the database
$user = null;
if (isset($_SESSION['user'])) {
    $stmt = $conn->prepare("SELECT * FROM Users WHERE Username = ?");
    $stmt->bind_param("s", $_SESSION['user']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

include('header.php');
?>

<main class="container mt-5">
    <h2 class="text-center">View Profile</h2>
    <?php if ($user): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Username:
                    <?php echo htmlspecialchars($user['Username']); ?>
                </h5>
                <p class="card-text">UserID:
                    <?php echo htmlspecialchars($user['UserID']); ?>
                </p>
                <p class="card-text">Password Hash:
                    If you can decode this !!!
                    <?php echo htmlspecialchars($user['PasswordHash']); ?>
                </p>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center">User not found.</p>
    <?php endif; ?>
</main>

<?php include('footer.php'); ?>