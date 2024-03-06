<?php

class Currency_Model_Rate extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Currency_Model_Resource_Rate";
        $this->_collectionClass = "Currency_Model_Resource_Collection_Rate";
    }

  
}