<?php 

class Currency_Block_Admin_Converter_Form extends Core_Block_Template{

    
    public function __construct(){
        $this->setTemplate('currency/admin/converter/form.phtml');
    }

    public function getConverterData()
    {
        return Mage::getModel('currency/converter')->load($this->getRequest()->getParams('id',0));
    }
    
}