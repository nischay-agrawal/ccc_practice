<?php

class Customer_Block_Account_Dashboard extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/account/dashboard.phtml');
    }
    public function getCustomerDetails()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        $customerData = Mage::getModel('customer/customer')
            ->load($customerId);
        return $customerData;
    }
}
