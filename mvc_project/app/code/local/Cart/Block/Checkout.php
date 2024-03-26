<?php

class Cart_Block_Checkout extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('cart/checkout.phtml');
    }

    public function getAddress(){
        $customerId = Mage::getModel("core/session")->get("logged_in_customer_id");
        if($customerId != ""){
            $addresses = Mage::getModel("customer/address")->getCollection()
                        ->addFieldToFilter("customer_id", $customerId)
                        ->getData();
            return $addresses;
        }
        return [];
    }

    public function getPaymentMethods(){
        return Mage::getModel("sales/payment")->getCollection()->getData();
    }
    public function getShippingMethods(){
        return Mage::getModel("sales/shipping")->getCollection()->getData();
    }
}