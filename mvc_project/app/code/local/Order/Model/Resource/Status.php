<?php

class Order_Model_Resource_Status extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('order_status', 'status_id');
    }
}