<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CSCI 2170 Example</title>
  <meta name="description" content="An example for CSCI 2170">
  <meta name="author" content="Gabriella Mosquera">
  <meta name="viewport" content="width=device-width, initial-scale= 1.0">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
 <div id="wrapper">
 <?php include("./includes/header.html")?>

  <section id="col_1">

	<h2 id="greeting">Welcome!</h2>
	<h3>Facebook helps you connect and share with the people in your life.</h3>
  </section>
  <section id="col_2">
    <h2>Sign Up</h2>
	<p>It's free and always will be.</p>
	<?php include("./includes/form.html")?>

  	<hr>
  	<p class="create"><strong><a href="#">Create a Page</a> for a celebrity, band or business.</strong></p>
  </section>
 </div>
 <script src="js/script.js"></script>
</body>
</html>