<?php

class Sales_Model_Order_History extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Order_History";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_History";
        $this->_modelClass = "sales/order_history";
    }
}