<?php
$books = [
    // Genre: Programming
    [
        'isbn' => '978-0134853987',
        'cover_image' => 'images/programming_book1.jpg',
        'author' => 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides',
        'title' => 'Design Patterns: Elements of Reusable Object-Oriented Software',
        'price' => 45.99,
        'publication_year' => 1994,
        'genres' => ['Programming', 'Software Engineering'],
        'blurb' => 'A classic book on software design patterns that every developer should read.'
    ],
    [
        'isbn' => '978-0262033848',
        'cover_image' => 'images/programming_book2.jpg',
        'author' => 'Brian W. Kernighan, Dennis M. Ritchie',
        'title' => 'The C Programming Language',
        'price' => 29.99,
        'publication_year' => 1978,
        'genres' => ['Programming', 'C Programming'],
        'blurb' => 'The definitive guide to the C programming language.'
    ],

    // Genre: Web Development
    [
        'isbn' => '978-0596005955',
        'cover_image' => 'images/webdev_book1.jpg',
        'author' => 'Douglas Crockford',
        'title' => 'JavaScript: The Good Parts',
        'price' => 19.99,
        'publication_year' => 2008,
        'genres' => ['Web Development', 'JavaScript'],
        'blurb' => 'Learn about the good parts of JavaScript and best practices for web development.'
    ],
    [
        'isbn' => '978-1449370758',
        'cover_image' => 'images/webdev_book2.jpg',
        'author' => 'Jon Duckett',
        'title' => 'HTML and CSS: Design and Build Websites',
        'price' => 24.99,
        'publication_year' => 2011,
        'genres' => ['Web Development', 'HTML', 'CSS'],
        'blurb' => 'A beginner-friendly guide to HTML and CSS for web design.'
    ],

    // Genre: Data Science
    [
        'isbn' => '978-1491957660',
        'cover_image' => 'images/datascience_book1.jpg',
        'author' => 'Hadley Wickham, Garrett Grolemund',
        'title' => 'R for Data Science',
        'price' => 35.99,
        'publication_year' => 2016,
        'genres' => ['Data Science', 'R Programming'],
        'blurb' => 'A practical introduction to data science with the R programming language.'
    ],
];

?>