<?php

class Loancalculator_Block_Calculator extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('loancalculator/form.phtml');
    }
    public function getBankRate()
    {
        // $bankData = Mage::getModel('loancalculator/bank')->getCollection()->addFieldToFilter('rate',['gt'=>10])->getData();
        $bankData = Mage::getModel('loancalculator/bank')->getCollection()->getData();
        return $bankData;
    }
}