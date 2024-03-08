<?php


class Catalog_Block_Category_View  extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate('catalog/category/view.phtml');
    }

    public function getProductData(){
        return Mage::getModel('catalog/product')->getCollection()->addFieldToFilter("category_id", $this->getRequest()->getParams('id'));
    }
}