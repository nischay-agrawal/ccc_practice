<?php

class Customer_Model_Account extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = "Customer_Model_Resource_Account";
        $this->_collectionClass = "Customer_Model_Resource_Collection_Account";
        $this->_modelClass = "customer/account";
    }

    public function login()
    {
        $credential = $this->getData();
        $customer = $this->getCollection()
            ->addFieldToFilter('customer_email', $credential['customer_email'])
            ->addFieldToFilter('password', $credential['password'])
            ->getFirstItem();
        $session = Mage::getSingleton('core/session');
        if (!is_null ($customer)) {
            $session->set('logged_in_customer_id', $customer->getId());
            $customerQuote = Mage::getModel("sales/quote")->getCustomerQuote();
            $quoteId = $session->get("quote_id");
            if ($quoteId != '') {
                if (is_null($customerQuote))
                    Mage::getModel("sales/quote")->setId($quoteId)->addData("customer_id", $session->get("logged_in_customer_id"))->save();
                else
                    Mage::getModel("sales/quote")->mergeQuote($quoteId, $customerQuote->getQuoteId());
            } else {
                if (!is_null($customerQuote))
                    $session->set("quote_id", $customerQuote->getQuoteId());
            }
            Mage::getModel("sales/quote")->initQuote();
            return true;
        } else {
            $session->remove('logged_in_customer_id');
            return false;
        }

    }
}