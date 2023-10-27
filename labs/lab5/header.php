<?php
include('pagecount.php'); // Include the page count script
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Independent Bookshop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Crossword Bookstore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="nameList.php">List</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php
                        if (isset($_COOKIE['user'])) {
                            $username = $_COOKIE['user'];
                            $cokkieCount = "visitsof$username";
                        
                           
                            if (isset($_COOKIE[$cokkieCount])) {
                                $number = $_COOKIE[$cokkieCount] + 1;
                            } else {
                                $number = 1; 
                            }
                        
                            setcookie($cokkieCount, $number, time() + 3600*365*24);
                        
                            echo '<li class="nav-item"><span class="nav-link">Welcome back, ' . $username . ' this is your visit ' . $number .'</span></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="login-icon fas fa-user"></i> Login</a></li>';
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>