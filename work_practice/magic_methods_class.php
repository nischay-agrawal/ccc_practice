<?php
    class Person {
        
        // public $name;
    
        // function __construct($name) {
        //     $this->name = $name;
        //     echo "{$this->name} has been created.\n";
        // }

        // function __destruct() {
        //     echo "Person object is being destroyed.\n";
        // }

        // private $data = ['name' => 'Nischay', 'age' => 20];
        // //for reading data fron private or protected
        // public function __get($name) {  
        //     return $this->data[$name];
        // }

        // private $data = [];
        // //for writing data in private or protected
        // public function __set($name, $value) {
        //     $this->data[$name] = $value;
        // }

        //for calling functions that are non accessibnle or does not exist
        public function __call($name, $arguments) {
            echo "Calling method '$name' " . implode(', ', $arguments) . "\n";
        }
    }
    
    // $person = new Person("Nischay");
    // unset($person);

    $person = new Person();
    // echo $person->name . "\n";
    // echo $person->age . "\n";
    // $person->name = "Nischay" ;
    $person->notExist("Nischay", "Agrawal");


?>