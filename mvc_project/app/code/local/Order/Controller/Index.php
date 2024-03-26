<?php

class Order_Controller_Index extends Core_Controller_Front_Action
{
    protected $_allowedActions = [];
    public function indexAction()
    {
        $layout = $this->getLayout();
        $orderBlock = Mage::getBlock('order/order');
        $layout->getChild('content')->addChild('order', $orderBlock);
        $layout->getChild('header')->setTemplate('page/header-1.phtml');
        $layout->getChild('head')
            ->addCss('header_1.css')
            ->addCss('sales/order.css');
        $layout->toHtml();
    }
}