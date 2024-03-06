<?php

class Currency_Model_Converter extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Currency_Model_Resource_Converter";
        $this->_collectionClass = "Currency_Model_Resource_Collection_Converter";
    }

}