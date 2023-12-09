<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Login</h1>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_regenerate_id();
    session_start();
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Fetch user data from the database based on the provided username
        $stmt = $conn->prepare("SELECT Username, PasswordHash FROM Users WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($dbUsername, $dbPasswordHash);
        $stmt->fetch();
        $stmt->close();

        // Verify the password
        if ($dbUsername && password_verify($password, $dbPasswordHash)) {
            // Login successful, set session and redirect
            $_SESSION['user'] = $dbUsername;
            setcookie('user', $dbUsername, time() + 3600, '/');
            header('Location: index.php');
            exit;
        } else {
            // Login failed
            echo '<div class="alert alert-danger" role="alert">Invalid username or password.</div>';
        }
    }
    setcookie('user', $username, time() + 3600, '/', '', true, true);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>