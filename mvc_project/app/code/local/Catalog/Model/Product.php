<?php

class Catalog_Model_Product extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Catalog_Model_Resource_Product";
        $this->_collectionClass = "Catalog_Model_Resource_Collection_Product";
        $this->_modelClass = "catalog/product";
    }
    public function getStatus()
    {
        $mapping = [
            1 => "enabled",
            0 => "disabled"
        ];
        return (isset ($this->_data['status'])) ? $mapping[$this->_data['status']] : '';
    }

    // public function _afterSave()
    // {
    //     $items = Mage::getModel("sales/quote_item")
    //         ->getCollection()
    //         ->addFieldToFilter("product_id", $this->getProductId())
    //         ->getData();
    //     foreach ($items as $_item) {
    //         $_item->addData("price", $this->getPrice())->save();
    //         Mage::getModel("sales/quote")->load($_item->getQuoteId())->save();
    //     }
    // }
}