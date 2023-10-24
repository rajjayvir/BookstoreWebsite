<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Cookie Counter</title>
	<meta name="description" content="Registration Page (Loops)">
	<meta name="author" content="Gabriella Mosquera">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section id="container">
		<form id="form" method="post">
			<label for="LastName">Enter Your Last Name:&nbsp;&nbsp;</label>
			<input type="text" id="LastName" name="lastName">
			<button type="submit">Submit</button>
		</form>
		<?php
		if($visits > 1){
			echo "<h1> Welcome back $lastName !! This is visit number <span class='important'>$visits</span></h1>";
		}
        else{
			echo "<h1> Welocme to my site! This is your first visit!</h1>";
		}
		?>
	</section>
</body>

</html>