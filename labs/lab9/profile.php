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
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">
                    Update Password
                </button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Delete Account
                </button>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center">User not found.</p>
    <?php endif; ?>
</main>

<!-- Modal for Update Password -->
<div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="updatePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePasswordModalLabel">Update Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php include('update_password.php'); ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Delete Account -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="process_delete_account.php" class="btn btn-danger">Delete Account</a>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>