<?php

class Loancalculator_Model_Resource_Bank extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('ccc_bank_rate', 'id');
    }
}