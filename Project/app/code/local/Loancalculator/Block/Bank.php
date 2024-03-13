<?php

class Loancalculator_Block_Bank extends Core_Block_Template{
    public function getBankRateByCode($bankCode=null){
        $bankData = Mage::getModel('loancalculator/bank')->getCollection()->getData();
        echo "<pre>";
        $bank = [];
        foreach($bankData as $_bank){
            $bank[$_bank->getBankCode()] = $_bank->getRate();
        }
        if(!is_null($bankCode)){
            return $bank[$bankCode];
        }else{
            return 0;
        }
    }
}