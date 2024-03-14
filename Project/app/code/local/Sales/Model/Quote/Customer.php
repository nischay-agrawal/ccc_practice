<?php

class Sales_Model_Quote_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Customer';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Customer';
    }
    public function addCustomer(Sales_Model_Quote $quote, $address)
    {
        $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");
        $this->setData($address);
        $customer = $this->getCollection()->addFieldToFilter("quote_id",$quote->getId())->addFieldToFilter("customer_id",$customerId)->getFirstItem();
        if($customer)
        {
            $this->setId($customer->getId());
        }
        $this->addData("quote_id", $quote->getId())
            ->addData("customer_id", $customerId)
            ->save();
        return $this;
    }
}