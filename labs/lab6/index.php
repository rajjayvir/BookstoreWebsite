<?php include('header.php'); 
?>

<main>
    <section class="container mt-5">
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
                            <p>by
                                <?php echo $book['author']; ?>
                            </p>
                            <p>Price: $
                                <?php echo $book['price']; ?>
                            </p>
                            <a href="books/<?php echo $book['isbn']; ?>.php" class="btn btn-primary">Buy</a>
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