<?php
    class Person {
        public $name;
    
        function __construct($name) {
            $this->name = $name;
            echo "{$this->name} has been created.\n";
        }
    }
    
    $person = new Person("Nischay");
    
?>