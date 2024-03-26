<?php

class Banner_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/admin/banner/form.phtml');
    }
    public function getBanner(){
        $bannerId = $this->getRequest()->getParams('id');
        $banner = Mage::getModel('banner/banner');
        if($bannerId){
            $banner->load($bannerId);
        }
        return $banner;
    }
}