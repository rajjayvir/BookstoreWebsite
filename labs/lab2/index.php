<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Independent Bookshop</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Crossword Bookstore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="list.php">All Books</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="nameList.php"> List</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="container mt-5">
            <h2 class="text-center">Featured Books</h2>
            <div class="row">
                <?php
                // Include list.php to access the $books array
                include('list.php');

                // Loop through the $books array to display book information
                foreach ($books as $book) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?php echo $book['cover_image']; ?>" class="card-img-top" alt="Book Cover"
                                style="width: 400px; height: 500px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $book['title']; ?>
                                </h5>
                                <p class="card-text">by
                                    <?php echo $book['author']; ?>
                                </p>
                                <p class="card-text">Price: $
                                    <?php echo $book['price']; ?>
                                </p>
                                <!-- <p class="card-text">Publication Year:
                                    <?php echo $book['publication_year']; ?>
                                </p>
                                <p class="card-text">Genres:
                                    <?php echo implode(', ', $book['genres']); ?>
                                </p>
                                <p class="card-text">
                                    <?php echo $book['blurb']; ?> 
                                </p>-->

                                <?php $isbnToDisplay = $book['isbn']; ?>

                                <a href="books/<?php echo $isbnToDisplay; ?>.php" class="btn btn-primary">Buy</a>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

    </main>

    <footer class="text-center mt-5">
        <p>&copy;
            <?php echo date("Y"); ?> [Crossword Bookstore]. All rights reserved.
        </p>
    </footer>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>