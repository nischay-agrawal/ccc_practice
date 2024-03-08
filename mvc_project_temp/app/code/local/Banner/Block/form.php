<?php 

class Banner_Block_Form extends Core_Block_Template{
    
    public function __construct(){
        $this->setTemplate('banner/admin/form.phtml');
    }

    public function getBannerData()
    {
        return Mage::getModel('banner/banner')->load($this->getRequest()->getParams('id',0));
    }

}