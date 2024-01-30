<?php
    class Calculator {
        public function add($a, $b) {
            return $a + $b;
        }

        public function subtract($a, $b) {
            return $a - $b;
        }

        public function multiply($a, $b) {
            return $a * $b;
        }

        public function divide($a, $b) {
            if ($b != 0) {
                return $a / $b;
            } else {
                return "Cannot divide by zero";
            }
        }
    }

    $calculator = new Calculator();
    echo $calculator->add(5, 3); // Output: 8
?>