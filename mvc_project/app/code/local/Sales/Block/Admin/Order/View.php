<?php

class Sales_Block_Admin_Order_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("sales/admin/order/view.phtml");
    }
    public function getOrder()
    {
        $id = $this->getRequest()->getParams("id");
        if ($id != '') {
            $order = Mage::getModel("sales/order")->load($id);
            return $order;
        }
    }
}