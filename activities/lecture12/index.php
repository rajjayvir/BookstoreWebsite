<?php
// Create your variables for your form data
$valid = '';
$postMsg = '';
$firstName = '';
$lastName = '';
$email = '';
$password = '';
$valid = 'Form data is being processed.';


// Function to clean user input
function clean($input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

// Function to validate the password
function validatePassword($password)
{
	// Password should use at least one number, one uppercase letter, one lowercase letter,
	// one special character, and be at least 12 characters long.
	return preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z0-9]).{12,}$/', $password);
}

// Let's validate the form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$postMsg = 'There was a POST request';

	// Validate First Name
	if (empty($_POST['firstName'])) {
		$firstName = 'First Name is required';
	} else {
		$firstName = clean($_POST['firstName']);
		// Allow letters, be non-case sensitive, and provide the option to include a middle name
		if (!preg_match('/^[a-zA-Z\s]+$/', $firstName)) {
			$firstName = 'Invalid First Name';
		} else {
			$firstName = 'Valid First Name';
		}
	}

	// Validate Last Name
	if (empty($_POST['lastName'])) {
		$lastName = 'Last Name is required';
	} else {
		$lastName = clean($_POST['lastName']);
		// Allow letters, be non-case sensitive, and allow for the use of apostrophes and hyphens
		if (!preg_match("/^[a-zA-Z\s'-]+$/", $lastName)) {
			$lastName = 'Invalid Last Name';
		} else {
			$lastName = 'Valid Last Name';
		}
	}

	// Validate Email
	if (empty($_POST['email'])) {
		$email = 'Email is required';
	} else {
		$email = clean($_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = 'Invalid email';
		} else {
			$email = 'Valid email';
		}
	}

	// Validate Password
	if (empty($_POST['password'])) {
		$password = 'Password is required';
	} else {
		$password = $_POST['password'];
		if (!validatePassword($password)) {
			$password = 'Invalid password';
		} else {
			$password = 'Valid Password';
		}
	}


	if ($firstName === 'Valid First Name' && $lastName === 'Valid Last Name' && $email === 'Valid email' && $password === 'Valid Password') {
		$valid = 'Form data is valid!';
	} else {
		$valid = 'Form data is invalid.';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
	<meta name="description" content="Registration Page (Loops)">
	<meta name="author" content="Gabriella Mosquera">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="container">
		<form id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset>
				<legend>Registration</legend>
				<p>
					<label for="firstName">First Name: </label>
					<input name="firstName" id="firstName" type="text" size="29">
				</p>
				<p>
					<label for="lastName">Last Name: </label>
					<input name="lastName" id="lastName" type="text" size="29">
				</p>
				<p>
					<label for="email">Email Address: </label>
					<input name="email" id="email" type="text" size="29">
				</p>
				<p>
					<label for="password">Password: </label>
					<input name="password" id="password" type="password" size="20">
				</p>
				<input type="submit" name="submit" value="Register">
			</fieldset>
			<p> <span class="error">Valid or Not: </span><em>
					<?= $valid; ?>
				</em></p>
			<p> <span class="success">First Name: </span><em>
					<?= $firstName; ?>
				</em></p>
			<p> <span class="success">Last Name: </span><em>
					<?= $lastName; ?>
				</em></p>
			<p> <span class="success">Email: </span><em>
					<?= $email; ?>
				</em></p>
			<p> <span class="success">Password: </span><em>
					<?= $password; ?>
				</em></p>
			<p> <span class="success">Post Message: </span><em>
					<?= $postMsg; ?>
				</em></p>
		</form>
	</div>
</body>

</html>