<?php

class Sales_Model_Quote_Payment extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Quote_Payment";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote_Payment";
        $this->_modelClass = "sales/quote_payment";
    }

    public function addPaymentMethod(Sales_Model_Quote $quote, $paymentOption){
        $this->setData($paymentOption)
            ->addData("quote_id", $quote->getId())
            ->save();
        return $this;
    }
}