<?php

class Calculator_Model_Resource_Calculator extends Core_Model_Resource_Abstract{
    public function __construct()
    {
        $this->init('ccc_calculator', 'id');
    }
}