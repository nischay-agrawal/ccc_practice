<?php

class Admin_Controller_Sales_Order extends Core_Controller_Admin_Action
{
    public function listAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild("content");
        $layout->getChild('head')->addCss('sales/admin/order.css');
        $orderList = $layout->createBlock("sales/admin_order");
        $content->addChild("orderList", $orderList);
        $layout->toHtml();
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild("content");
        $layout->getChild('head')->addCss('sales/admin/order.css');
        $orderView = $layout->createBlock("sales/admin_order_view");
        $content->addChild("orderView", $orderView);
        $layout->toHtml();
    }

}