<?php
session_start();

include "list.php";

$userWelcomeMessage = isset($_SESSION['user']) ? "Welcome back, " . htmlspecialchars($_SESSION['user']) . "!" : "";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['action']) and ($_POST['action'] == 'AddToCart')) {

    $item = array(
        'title' => $_POST['title'],
        'price' => $_POST['price']
    );

    $_SESSION['cart'][] = $item;
    header('Location: .');
    exit;
}

if (isset($_GET['action']) and $_GET['action'] == 'EmptyCart') {
    unset($_SESSION['cart']);
    header('Location: index.php');
    exit;
}


if (isset($_GET['cart'])) {

    $cart = array();
    $total = 0;

    foreach ($_SESSION['cart'] as $cartItem) {
        foreach ($books as $book) {
            if ($book['title'] == $cartItem['title']) {
                $cart[] = $book;
                $total += floatval($cartItem['price']);
                break;
            }
        }
    }

    include 'cart.php';
    exit;
}
include('header.php');
?>

<main>
    <section class="container mt-5">
        <h2 class="text-center">
            <?php echo $userWelcomeMessage; ?>
        </h2>
        <h2 class="text-center">Featured Books</h2>
        <div class="row">
            <?php
            include('list.php');

            foreach ($books as $book) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $book['cover_image']; ?>" class="card-img-top" alt="Book Cover"
                            style="width: 70%; height: 50%;">
                        <div class="card-body">
                            <p>
                                <?php echo $book['title']; ?>
                            </p>
                            <p>By:
                                <?php echo $book['author']; ?>
                            </p>
                            <p>Price: $
                                <?php echo $book['price']; ?>
                            </p>

                            <form action="" method="post">
                                <input type="hidden" name="title" value="<?php echo htmlspecialchars($book["title"]); ?>">
                                <input type="hidden" name="price" value="<?php echo htmlspecialchars($book["price"]); ?>">
                                <a href="books/<?php echo $book['isbn']; ?>.php" class="btn btn-primary">About</a>

                                <button type="submit" class="btn btn-success" name="action" value="AddToCart">Add to Cart
                                    Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</main>

<?php include('footer.php'); ?>