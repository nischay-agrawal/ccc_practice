<?php

class Banner_Model_Banner extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = 'Banner_Model_Resource_Banner';
        $this->_collectionClass = 'Banner_Model_Resource_Collection_Banner';
        $this->_modelClass = 'banner/banner';
    }

    public function getBanners(){
        $banners = [];
        $banners['slider'] = $this->getCollection()->addFieldToFilter("show_on", "slider")->getData();
        $banners['grid1'] = $this->getCollection()->addFieldToFilter("show_on", "grid1")->getData();
        return $banners;
    }
}