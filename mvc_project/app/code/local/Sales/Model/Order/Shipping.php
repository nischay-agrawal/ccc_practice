<?php

class Sales_Model_Order_Shipping extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Order_Shipping";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Shipping";
        $this->_modelClass = "sales/order_shipping";
    }

    public function addShippingMethod(Sales_Model_Quote_Shipping $quoteShipping, $orderId)
    {
        $quoteShipping->removeData("shipping_id")->removeData("quote_id");
        $this->setData($quoteShipping->getData())
            ->addData("order_id", $orderId)
            ->save();
        return $this;
    }
    public function _afterSave()
    {
        if ($this->getOrderId()) {
            Mage::getModel("sales/order")
                ->load($this->getOrderId())
                ->addData("shipping_id", $this->getId())
                ->save();
        }
    }
}