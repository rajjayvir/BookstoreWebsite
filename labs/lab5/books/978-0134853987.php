<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
    <title>
        <?php echo $selectedBook['title']; ?>
    </title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="../index.php">Crossword Bookstore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../list.php">Books</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <?php

        include('../list.php');

        $isbn = '978-0134853987';

        $selectedBook = null;
        foreach ($books as $book) {
            if ($book['isbn'] === $isbn) {
                $selectedBook = $book;
                break;
            }
        }

        if ($selectedBook) {
            // Display book details
            echo '<div class="row">';
            echo '<div class="col-md-6">';
            echo '<img src="../' . $selectedBook['cover_image'] . '" alt="Book Cover" class="img-fluid" style="width: 50%; height: auto;">';
            echo '</div>';
            echo '<div class="col-md-6">';
            echo '<h2>' . $selectedBook['title'] . '</h2>';
            echo '<p class="font-weight-bold">by ' . $selectedBook['author'] . '</p>';
            echo '<p class="font-weight-bold">Price: $' . $selectedBook['price'] . '</p>';
            echo '<p class="font-weight-bold">Publication Year: ' . $selectedBook['publication_year'] . '</p>';
            echo '<p class="font-weight-bold">Genres: ' . implode(', ', $selectedBook['genres']) . '</p>';
            echo '<p>' . $selectedBook['blurb'] . '</p>';
            echo '<button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                    Buy
                </button>';
            echo '</div>';
            echo '</div>';
        } else {

            echo '<p class="container mt-5">Book not found.</p>';
        }
        ?>
        <div class="collapse" id="collapseWidthExample">
            <div class="card card-body" style="width: 300px;">
                Coming Soon.
            </div>
        </div>
    </main>

    <footer class="text-center mt-5">
        <p>&copy;
            <?php echo date("Y"); ?> Crossword Bookstore. All rights reserved.
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>