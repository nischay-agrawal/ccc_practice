<?php

class Sales_Model_Resource_Payment extends Core_Model_Resource_Abstract{
    public function __construct(){
        $this->init("payment_method", "payment_id");
    }
}