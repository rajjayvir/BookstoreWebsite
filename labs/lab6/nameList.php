<?php


include('header.php');
// Include the header template
?>

<main class="container mt-5">
    <h1 class="text-center">List of All Books in a List</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include list.php to access the $books array
            include('list.php');

            // Loop through the $books array and create table rows
            foreach ($books as $book) {
                echo '<tr>';
                echo '<td>' . $book['title'] . '</td>';
                echo '<td>$' . $book['price'] . '</td>';
                echo '<td><a href="books/' . $book['isbn'] . '.php" class="btn btn-primary">Buy</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</main>

<?php
include('footer.php'); // Include the footer template
?>