<?php
    class Post {
        public $title;
        public $content;

        public function displayInfo() {
            echo "Title: $this->title<br>Content: $this->content";
        }
    }

    class Blog {
        private $posts = [];

        public function addPost(Post $post) {
            $this->posts[] = $post;
        }

        public function displayAllPosts() {
            foreach ($this->posts as $post) {
                $post->displayInfo();
                echo "<br><br>";
            }
        }
    }

    $post1 = new Post();
    $post1->title = "Introduction to PHP";
    $post1->content = "This is a blog post about PHP.";

    $post2 = new Post();
    $post2->title = "Object-Oriented Programming";
    $post2->content = "An overview of OOP principles.";

    $blog = new Blog();
    $blog->addPost($post1);
    $blog->addPost($post2);

    $blog->displayAllPosts();

?>