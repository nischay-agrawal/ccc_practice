<?php 

class Sales_Block_Admin_Shipping_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("sales/admin/shipping/list.phtml");
    }

    public function getShippingMethods(){
        return Mage::getModel("sales/shipping")->getCollection()->getData();
    }
}