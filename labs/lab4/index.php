<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file -->
</head>

<body>
    <h1>Registration Form</h1>
    <form method="POST" action="process.php">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name">
        <br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name">
        <br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <br>

        <input type="submit" value="Register">
    </form>
</body>

</html>
