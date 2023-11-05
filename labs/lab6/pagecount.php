<?php
if (isset($_COOKIE['user'])) {
    $username = $_COOKIE['user'];
    $cokkieCount = "visitsof$username";


    if (isset($_COOKIE[$cokkieCount])) {
        $number = $_COOKIE[$cokkieCount] + 1;
    } else {
        $number = 1;
    }

    setcookie($cokkieCount, $number, time() + 3600 * 690 * 24);

    echo '<li class="nav-item"><span class="nav-link">Welcome back, ' . $username . ' this is your visit ' . $number . '</span></li>';
    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
} else {
    echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="login-icon fas fa-user"></i> Login</a></li>';
}
?>