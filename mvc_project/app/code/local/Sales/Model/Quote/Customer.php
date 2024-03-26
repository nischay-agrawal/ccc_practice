<?php

class Sales_Model_Quote_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Quote_Customer";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote_Customer";
        $this->_modelClass = "sales/quote_customer";
    }

    public function addCustomer(Sales_Model_Quote $quote, $address)
    {
        $customerId = Mage::getModel("core/session")->get("logged_in_customer_id");
        $this->setData($address)
            ->addData("quote_id", $quote->getId())
            ->addData("customer_id", $customerId)
            ->save();
        return $this;
    }
}