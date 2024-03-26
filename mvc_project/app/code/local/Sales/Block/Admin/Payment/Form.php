<?php

class Sales_Block_Admin_Payment_Form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("sales/admin/payment/form.phtml");
    }
    public function getPaymentMethod(){
        $id = $this->getRequest()->getParams("id");
        $payment = Mage::getModel("sales/payment");
        if($id){
            $payment->load($id);
        }
        return $payment;
    }
}