<?php

class Catalog_Block_Product_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/product/view.phtml');
    }
    public function getItem()
    {
        $id = $this->getRequest()->getParams('product_id');
        if ($id) {
            $list = Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('product_id', $id);
            return $list->getData();
        }
        $list = Mage::getModel("catalog/product")->getCollection();
        return $list->getData();
    }
}