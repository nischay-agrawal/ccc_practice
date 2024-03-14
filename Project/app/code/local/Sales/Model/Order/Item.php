<?php

class Sales_Model_Order_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Order_Item";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Item";
        $this->_modelClass = "sales/order_item";
    }
    public function _beforeSave()
    {
        $product = Mage::getModel("catalog/product")->load($this->getProductId());
        $this->addData("product_name", $product->getName())
            ->addData("product_color", $product->getColor());
    }
    public function addItem(Sales_Model_Quote_Item $quoteItem, $orderId)
    {
        $quoteItem->removeData('item_id')
            ->removeData('quote_id');
        $this->setData($quoteItem->getData())
            ->addData("order_id", $orderId);
        $this->save();
        return $this;
    }
}