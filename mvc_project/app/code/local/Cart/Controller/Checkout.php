<?php

class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    protected $_allowedActions = [];
    public function indexAction()
    {
        $layout = $this->getLayout();
        $checkoutBlock = Mage::getBlock('cart/checkout');
        $layout->getChild('content')->addChild('checkout', $checkoutBlock);
        $layout->getChild('header')->setTemplate('page/header-1.phtml');
        $layout->getChild('head')
            ->addCss('sales/cart.css')
            ->addCss('header_1.css')
            ->addCss('sales/checkout.css');
        $layout->toHtml();
    }
}