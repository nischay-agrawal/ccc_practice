<?php

class Sales_Model_Resource_Shipping extends Core_Model_Resource_Abstract{
    public function __construct(){
        $this->init("shipping_method", "shipping_id");
    }
}