<?php

class Sales_Model_Quote_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Quote_Item";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote_Item";
        $this->_modelClass = "sales/quote_item";
    }
    public function getProduct()
    {
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }

    protected function _beforeSave()
    {
        if ($this->getProductId()) {
            $price = $this->getProduct()->getPrice();
            $this->addData('price', $price);
            $this->addData('row_total', $price * $this->getQty());
        } else {
        }
    }

    public function addItem(Sales_Model_Quote $quote, $productId, $qty)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();

        if ($item) {
            $qty = $qty + $item->getQty();
            $this->setId($item->getId());
        }
        $this->addData("quote_id", $quote->getId())
            ->addData("product_id", $productId)
            ->addData("qty", $qty);
        $this->save();

        return $this;
    }
}