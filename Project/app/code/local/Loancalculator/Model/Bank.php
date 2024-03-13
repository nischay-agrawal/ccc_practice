<?php

class Loancalculator_Model_Bank extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Loancalculator_Model_Resource_Bank';
        $this->_collectionClass = 'Loancalculator_Model_Resource_Collection_Bank';
    }
}
