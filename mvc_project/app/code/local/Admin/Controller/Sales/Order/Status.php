<?php

class Admin_Controller_Sales_Order_Status extends Core_Controller_Admin_Action
{
    public function saveAction()
    {
        $orderId = $this->getRequest()->getParams('id');
        $from_status = Mage::getModel("sales/order")->load($orderId)->getOrderStatus();
        $status = $this->getRequest()->getParams('status');
        Mage::getModel("sales/order")
            ->setId($orderId)->addData("order_status", $status)
            ->save();
        Mage::getModel("sales/order_history")->addData("order_id", $orderId)->addData("from_status", $from_status)->addData("to_status", $status)->addData("action_by", "admin")->save();
        $this->setRedirect("admin/sales_order/view?id=" . $orderId);
    }
}