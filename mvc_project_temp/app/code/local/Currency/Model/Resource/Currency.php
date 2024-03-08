<?php

class Currency_Model_Resource_Currency extends Core_Model_Resource_Abstract{

    public function __construct(){
        $this->init("ccc_currency_rate","id");
    }
}