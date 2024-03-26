<?php

class Sales_Controller_Order extends Core_Controller_Front_Action
{
    public function cancelAction(){
        $orderId = $this->getRequest()->getParams('id');
        $from_status = Mage::getModel("sales/order")->load($orderId)->getOrderStatus();
        Mage::getModel("sales/order")->setId($orderId)->addData("order_status", 3)->save();
        Mage::getModel("sales/order_history")->addData("order_id", $orderId)->addData("from_status", $from_status)->addData("to_status", 3)->addData("action_by", "customer")->save();
        $this->setRedirect("order");
    }
}