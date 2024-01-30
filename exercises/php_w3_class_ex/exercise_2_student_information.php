<?php
    class Student {
        public $name;
        public $age;
        public $grade;

        public function displayInfo() {
            echo "Name: $this->name, Age: $this->age, Grade: $this->grade";
        }
    }

    $student = new Student();
    $student->name = "Nischay";
    $student->age = 20;
    $student->grade = "A";
    $student->displayInfo();

?>