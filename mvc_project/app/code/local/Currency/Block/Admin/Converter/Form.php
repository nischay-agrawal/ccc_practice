<?php 

class Currency_Block_Admin_Converter_Form extends Core_Block_Template{

    
    public function __construct(){
        $this->setTemplate('currency/admin/converter/form.phtml');
    }

    public function getConverterData()
    {
        return Mage::getModel('currency/converter')->load($this->getRequest()->getParams('id',0));
    }

    public function getCountry()
    {
        $catData = Mage::getModel('currency/rate')->getCollection();

        if (isset($this->_data['country'])) {
            foreach ($catData->getData() as $rate) {
                $rateId = $rate->getId();
                $rateCountry = $rate->getCountry();
                $mapping = [
                    $rateId => $rateCountry,
                ];
                return $mapping[$this->_data['country']];
            }
        }
    }

    
}