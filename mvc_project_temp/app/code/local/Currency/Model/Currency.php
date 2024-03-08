<?php

class Currency_Model_Currency extends Core_Model_Abstract{
    
    public function init(){
        $this->_resourceClass = "Currency_Model_Resource_Currency";
        $this->_collectionClass = "Currency_Model_Resource_Collection_Currency";
        $this->_modelClass = "currency/currency";
    }

}