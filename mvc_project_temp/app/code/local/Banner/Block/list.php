<?php 

class Banner_Block_List extends Core_Block_Template{
    
    public function __construct(){
        $this->setTemplate('banner/admin/list.phtml');
    }

    public function getBannerData()
    {
        return Mage::getModel('banner/banner')->getCollection();
    }
}