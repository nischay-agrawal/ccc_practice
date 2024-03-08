<?php

class Catalog_Model_Product extends Core_Model_Abstract{

    // protected $_catData= [];
    public function init(){
        $this->_resourceClass = "Catalog_Model_Resource_Product";
        $this->_collectionClass = "Catalog_Model_Resource_Collection_Product";
        $this->_modelClass = "catalog/product";
    }

    public function getStatus(){
        if (isset($this->_data['status'])) {
            $mapping = [
                1=>"Enable",
                0=>"Disabel"
            ];
            return $mapping[$this->_data['status']];
        }
    }

    // public function getCategoryData($id = ''){
    //     if(isset($this->_catData[$id])){
    //         return $this->_catData[$id];
    //     }else{
    //         $catData = Mage::getModel('catalog/category')->getCollection();
    //         foreach ($catData->getData() as $value) {
    //             $this->_catData[$value->getCategoryId()] = $value->getCategoryName();
    //         }
    //         return $this->_catData;
    //     }
    // }
}