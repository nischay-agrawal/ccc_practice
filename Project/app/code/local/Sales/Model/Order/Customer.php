<?php

class Sales_Model_Order_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Sales_Model_Resource_Order_Customer";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Customer";
        $this->_modelClass = "sales/order_customer";
    }
    public function addCustomer(Sales_Model_Quote_Customer $quoteCustomer, $orderId){
        $quoteCustomer->removeData("quote_customer_id")->removeData("quote_id");
        $this->setData($quoteCustomer->getData())
            ->addData("order_id", $orderId)
            ->save();
        return $this;
    }
}