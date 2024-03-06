<?php 

class Currency_Block_Admin_Rate_Form extends Core_Block_Template{
    
    public function __construct(){
        $this->setTemplate('currency/admin/rate/form.phtml');
    }

    public function getRateData()
    {
        return Mage::getModel('currency/rate')->load($this->getRequest()->getParams('id',0));
    }
}