<?php 

class Banner_Block_Banner extends Core_Block_Template{
    
    public function __construct(){
        $this->setTemplate('banner/banner.phtml');
    }

    public function getBannerData()
    {
        return Mage::getModel('banner/banner')->getCollection();
    }

}