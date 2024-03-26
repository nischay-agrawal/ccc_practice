<?php

class Catalog_Model_Category extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Catalog_Model_Resource_Category";
        $this->_collectionClass = "Catalog_Model_Resource_Collection_Category";
        $this->_modelClass = "catalog/category";
    }
    public function getCategoryArray(){
        $categoryArray = [];
        $categoryCollectionData = Mage::getModel('catalog/category')->getCollection()->getData();
        foreach($categoryCollectionData as $category){
            $categoryArray[$category->getCategory_id()] = $category->getCategory_name();
        }
        return $categoryArray;
    }
}