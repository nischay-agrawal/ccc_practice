<?php
class Customer_Controller_Address extends Core_Controller_Front_Action
{
    public function saveAction()
    {
        $data = $this->getRequest()->getPostData('customerAddress');
        $customerId = Mage::getSingleton("core/session")->get('logged_in_customer_id');
        Mage::getModel("customer/address")->setData($data)->addData("customer_id",$customerId)->save();
        $this->setRedirect("cart/checkout/form");
    }
}