<?php
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'AddToCart') {
    $item = array(
        'title' => $_POST['title'],
        'price' => $_POST['price']
    );
    $_SESSION['cart'][] = $item;
    header('Location: nameList.php');
    exit;
}

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
                echo '<td>
                    <form action="" method="post">
                        <input type="hidden" name="title" value="' . htmlspecialchars($book["title"]) . '">
                        <input type="hidden" name="price" value="' . htmlspecialchars($book["price"]) . '">
                        <button type="submit" class="btn btn-success" name="action" value="AddToCart">Add to Cart</button>
                    </form>
                </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</main>

<?php
include('footer.php'); // Include the footer template
?>
