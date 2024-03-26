<?php

class Sales_Model_Order_Payment extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Order_Payment";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Payment";
        $this->_modelClass = "sales/order_payment";
    }

    public function addPaymentMethod(Sales_Model_Quote_Payment $quotePayment, $orderId)
    {
        $quotePayment->removeData("payment_id")->removeData("quote_id");
        $this->setData($quotePayment->getData())
            ->addData("order_id", $orderId)
            ->save();
        return $this;
    }
    public function _afterSave()
    {
        if ($this->getOrderId()) {
            Mage::getModel("sales/order")
                ->load($this->getOrderId())
                ->addData("payment_id", $this->getId())
                ->save();
        }
    }
}