<?php

class Cart_Controller_Index extends Core_Controller_Front_Action
{
    protected $_allowedActions = ['index'];
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('header')->setTemplate('page/header-1.phtml');
        $layout->getChild('head')->addCss('sales/cart.css')->addCss('header_1.css');
        $layout->getChild('content')->addChild('cart', Mage::getBlock('cart/cart'));
        $layout->toHtml();
    }
}