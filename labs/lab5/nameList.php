<?php
include('header.php');
// Include the header template
?>

<?php
include('pagecount.php'); // Include the page count script
?>


<main class="container mt-5">
    <h1 class="text-center">List of All Books in a List</h1>
    <ul class="list-group">
        <?php
        // Include list.php to access the $books array
        include('list.php');

        // Loop through the $books array and list book names
        foreach ($books as $book) {
            echo '<li class="list-group-item">' . $book['title'] . '</li>';
        }
        ?>
    </ul>
</main>

<?php
include('footer.php'); // Include the footer template
?>