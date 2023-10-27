<?php
// Delete the user cookie
setcookie('user', '', time() - 3600, '/');
header('Location: index.php'); // Redirect back to your catalog page
?>
