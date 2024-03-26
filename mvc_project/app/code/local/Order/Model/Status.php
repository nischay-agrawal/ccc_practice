<?php

class Order_Model_Status extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClass = "Order_Model_Resource_Status";
        $this->_collectionClass = "Order_Model_Resource_Collection_Status";
        $this->_modelClass = "order/status";
    }
}