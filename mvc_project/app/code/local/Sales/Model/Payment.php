<?php

class Sales_Model_Payment extends Core_Model_Abstract{
    public function init(){
        $this->_collectionClass = "Sales_Model_Resource_Collection_Payment";
        $this->_resourceClass = "Sales_Model_Resource_Payment";
        $this->_modelClass = "sales/payment";
    }
}