<?php
    class Shape {
        // Common properties/methods for all shapes
        public $noOfSides;
        public $size;
        public function calculatePerimeter(){
            return $this->noOfSides * $this->size ;
        }

        public function display() {
            echo "Perimeter: " . $this->calculatePerimeter() . "\n";
        }
    }

    class Circle extends Shape {
        public $radius;

        public function calculateArea() {
            return pi() * pow($this->radius, 2);
        }

        public function calculatePerimeter() {
            return 2 * pi() * $this->radius;
        }
    }

    class Rectangle extends Shape {
        public $length;
        public $width;

        public function calculateArea() {
            return $this->length * $this->width;
        }

        public function calculatePerimeter() {
            return 2 * ($this->length + $this->width);
        }
    }

    // Example Usage:
    $circle = new Circle();
    $circle->radius = 5;

    $rectangle = new Rectangle();
    $rectangle->length = 4;
    $rectangle->width = 6;

    echo "Circle Area: " . $circle->calculateArea() . "<br>";
    echo "Rectangle Perimeter: " . $rectangle->calculatePerimeter();

?>