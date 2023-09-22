<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CSCI 2170 - Lecture 5</title>
    <meta name="description" content="Title of Site">
    <meta name="author" content="Author Name">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
    <div class="page">
        <section id="description">
            <h1>Lecture 5 Activity</h1>
            <p>Create a PHP file, this file should include a set of input controls to allow for the following calculations: <strong>add</strong>, <strong>subtract</strong>, <strong>multiply</strong>, <strong>divide, and modulus.</strong> And use some of PHP's built-in functions and arrays to better structure your code.</p>
        </section>
        <div class="content">
            <form method="post" action="" class="calculator">
                <fieldset>
                    <legend>Calculator</legend>
                    <label for="number1" class="notVisible">Number 1:</label>
                    <input type="number" name="number1" id="number1" aria-label="Number 1" tabindex="0" placeholder="e.g. 2">
                    <label for="number2" class="notVisible">Number 2:</label>
                    <input type="number" name="number2" id="number2" aria-label="Number 2" placeholder="e.g. 5">
                    <br>
                    <button name="operation" value="add">Add</button>
                    <button name="operation" value="subtract">Subtract</button>
                    <button name="operation" value="multiply">Multiply</button>
                    <button name="operation" value="divide">Divide</button>
                    <button name="operation" value="modulus">Modulus</button>
                    <p class="result">Result: <em><?php echo calculateResult(); ?></em></p>
                </fieldset>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy;Copyright Jayvirsinh</p>
    </footer>

    <?php
    function calculateResult()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number1 = $_POST["number1"];
            $number2 = $_POST["number2"];
            $operation = $_POST["operation"];

            switch ($operation) {
                case "add":
                    return $number1 + $number2;
                case "subtract":
                    return $number1 - $number2;
                case "multiply":
                    return $number1 * $number2;
                case "divide":
                    if ($number2 != 0) {
                        return $number1 / $number2;
                    } else {
                        return "Division by zero is not allowed.";
                    }
                case "modulus":
                    if ($number2 != 0) {
                        return $number1 % $number2;
                    } else {
                        return "Modulus by zero is not allowed.";
                    }
                default:
                    return "Invalid operation selected.";
            }
        }

        return "Check Once again"; // Default empty result
    }
    ?>
</body>
</html>
