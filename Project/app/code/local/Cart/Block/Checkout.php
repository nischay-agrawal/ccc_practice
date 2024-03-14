<?php
class Cart_Block_Checkout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout.phtml');
    }
    public function getAddress()
    {
        $id  = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $list = Mage::getModel('customer/address')->getCollection()->addFieldToFilter("customer_id",$id);
        return $list->getData();
    }
    public function getQuoteId()
    {
        return Mage::getSingleton('core/session')->get('quote_id');
    }
}