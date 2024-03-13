<?php

class Loancalculator_Model_Calculator extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Loancalculator_Model_Resource_Calculator';
        $this->_collectionClass = 'Loancalculator_Model_Resource_Collection_Calculator';
    }
    protected function _beforeSave(){
        $bankCode = $this->getBankCode();
        $r = Mage::getBlock('loancalculator/bank')->getBankRateByCode($bankCode) / 12;
        $p = $this->getLoanAmount();
        $n = $this->getTerm();

        $result = ($p*($r)*pow(($r+1), $n))/(pow($r+1, $n-1));
        $this->addData('result', $result);
    
    }
    public function _afterSave(){

    }
}
