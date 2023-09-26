<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Independent Bookshop</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS here -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">Crossword Bookstore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto"> <!-- Align the menu to the right -->
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="list.php">All Books</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="nameList.php">List</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <h1 class="text-center">List of All Books in a List </h1>
        <ul class="list-group">
            <?php
            // Include list.php to access the $books array
            include('list.php');

            // Loop through the $books array and list book names
            for ($i = 0; $i < count($books); $i++) {
                echo '<li class="list-group-item">' . $books[$i]['title'] . '</li>';
            }
            ?>
        </ul>
    </main>

    <footer class="text-center mt-5">
        <p>&copy;
            <?php echo date("Y"); ?> Crossword Bookstore. All rights reserved.
        </p>
    </footer>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>