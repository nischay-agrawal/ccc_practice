<?php
    class Point {
        public $x;
        public $y;

        public function calculateDistance(Point $other) {
            return sqrt(pow($this->x - $other->x, 2) + pow($this->y - $other->y, 2));
        }
    }

    $point1 = new Point();
    $point1->x = 1;
    $point1->y = 2;

    $point2 = new Point();
    $point2->x = 4;
    $point2->y = 6;

    echo $point1->calculateDistance($point2);
    // $this->x = 1
    // $other->x = 4
    // $this->y = 2
    // $other->y = 6
    // $this->x "-" $other->x = -3
    // "pow"($this->x - $other->x, 2) = 9
    // $this->y "-" $other->y = -4
    // "pow"($this->y - $other->y, 2) = 16
    // pow($this->x - $other->x, 2) "+" pow($this->y - $other->y, 2) = 25
    // "sqrt"(pow($this->x - $other->x, 2) + pow($this->y - $other->y, 2)) = 5

?>


