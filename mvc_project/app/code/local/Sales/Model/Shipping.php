<?php

class Sales_Model_Shipping extends Core_Model_Abstract{
    public function init(){
        $this->_collectionClass = "Sales_Model_Resource_Collection_Shipping";
        $this->_resourceClass = "Sales_Model_Resource_Shipping";
        $this->_modelClass = "sales/shipping";
    }
}