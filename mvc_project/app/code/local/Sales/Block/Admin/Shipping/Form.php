<?php

class Sales_Block_Admin_Shipping_Form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("sales/admin/shipping/form.phtml");
    }

    public function getShippingMethod(){
        $id = $this->getRequest()->getParams("id");
        $shipping = Mage::getModel("sales/shipping");
        if($id){
            $shipping->load($id);
        }
        return $shipping;
    }
}