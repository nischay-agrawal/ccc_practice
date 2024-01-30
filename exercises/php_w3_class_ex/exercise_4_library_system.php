<?php
    class Book {
        public $title;
        public $author;

        public function displayInfo() {
            echo "Title: $this->title,<br> Author: $this->author<br>";
        }
    }

    class Library {
        private $books = [];

        public function addBook(Book $book) {
            $this->books[] = $book;
        }

        public function displayAllBooks() {
            foreach ($this->books as $book) {
                $book->displayInfo();
                echo "<br>";
            }
        }
    }

    $book1 = new Book();
    $book1->title = "The Catcher in the Rye";
    $book1->author = "J.D. Salinger";
    //$book1->displayInfo();

    $book2 = new Book();
    $book2->title = "To Kill a Mockingbird";
    $book2->author = "Harper Lee";

    $library = new Library();
    $library->addBook($book1);
    $library->addBook($book2);

    $library->displayAllBooks();

?>