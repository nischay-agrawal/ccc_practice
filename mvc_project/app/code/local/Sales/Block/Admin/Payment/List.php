<?php 

class Sales_Block_Admin_Payment_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("sales/admin/payment/list.phtml");
    }

    public function getPaymentMethods(){
        return Mage::getModel("sales/payment")->getCollection()->getData();
    }
}