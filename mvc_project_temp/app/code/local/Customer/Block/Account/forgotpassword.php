<?php
class Customer_Block_Account_Forgotpassword extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/account/forgotpassword.phtml');
    }

    public function getCustomer(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $customerData = Mage::getModel('customer/account')->load($customerId);
        return $customerData;
    }
}