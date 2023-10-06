<?php
$first_name = $last_name = $email = $password = $confirm_password = "";

$errors = array();

//Regex
$regex_name = '/^[A-Za-z]+( [A-Za-z]+)?$/';
$regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
$regex_password = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate First Name
    $first_name = $_POST["first_name"];
    if (!preg_match($regex_name, $first_name)) {
        $errors["first_name"] = "Invalid First Name";
    }

    // Validate Last Name
    $last_name = $_POST["last_name"];
    if (!preg_match($regex_name, $last_name)) {
        $errors["last_name"] = "Invalid Last Name";
    }

    // Validate Email
    $email = $_POST["email"];
    if (!preg_match($regex_email, $email)) {
        $errors["email"] = "Invalid Email Address";
    }

    // Validate Password
    $password = $_POST["password"];
    if (!preg_match($regex_password, $password)) {
        $errors["password"] = "Invalid Password";
    }

    // Confirm Password
    $confirm_password = $_POST["confirm_password"];
    if ($password !== $confirm_password) {
        $errors["confirm_password"] = "Passwords do not match";
    }

    // If there are no errors, redirect to the welcome page
    if (empty($errors)) {
        header("Location: welcome.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="process.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
                <span class="error">
                    <?php echo $errors["first_name"] ?? ""; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>
                <span class="error">
                    <?php echo $errors["last_name"] ?? ""; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                <span class="error">
                    <?php echo $errors["email"] ?? ""; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="error">
                    <?php echo $errors["password"] ?? ""; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span class="error">
                    <?php echo $errors["confirm_password"] ?? ""; ?>
                </span>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Register</button>
            </div>
        </form>
    </div>
</body>

</html>