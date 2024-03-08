<?php

class Currency_Model_Usercurrency extends Core_Model_Abstract{
    
    public function init(){
        $this->_resourceClass = "Currency_Model_Resource_Usercurrency";
        $this->_collectionClass = "Currency_Model_Resource_Collection_Usercurrency";
        $this->_modelClass = "currency/usercurrency";
    }


    function convertCurrency($data) {
    
        if ($data['amount'] !== null) {
            
            $convertedAmount = $data['amount'] * ($data['currency_country'] / $data['country']);
            return $convertedAmount;
        } else {
            return null;
        }
    }
}