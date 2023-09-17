<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Dalhousie CS</title>
</head>
<body>
    <?php
    // Define student details
    $studentName = "Jayvirsinh Raj";
    $studentID = 907110;
    $program = "Computer Science";
    $isComputerScienceStudent = false; // Default to false


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the student is from Dalhousie based on the checkbox value
        $isDalhousieStudent = isset($_POST["isDalhousieStudent"]);

        if ($isDalhousieStudent) {
            // If the student is from Dalhousie, set the Computer Science status to true
            $isComputerScienceStudent = true;
        }
    }

    // Display a welcome message
    echo "<h1>Welcome, $studentName!</h1>";
    
    // Display program and student ID
    if ($isComputerScienceStudent) {
        echo "<p>You are a student in the $program program at Dalhousie University.</p>";
        echo "<p>Your student ID is B00$studentID.</p>";
        echo 5 + 5;
    } else {
        echo "<p>You are not a Computer Science student at Dalhousie University.</p>";
    }
    ?>

    <form method="post">
        <label for="isDalhousieStudent">Are you a Dalhousie student?</label>
        <input type="checkbox" id="isDalhousieStudent" name="isDalhousieStudent">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
