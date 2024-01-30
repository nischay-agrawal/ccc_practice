<?php
    class Person {
        public $name;
    
        // function __construct($name) {
        //     $this->name = $name;
        //     echo "{$this->name} has been created.\n";
        // }

        function __destruct() {
            echo "Person object is being destroyed.\n";
        }
    }
    
    $person = new Person("Nischay");
    unset($person);
    
?>