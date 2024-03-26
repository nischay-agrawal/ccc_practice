<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('content')
            ->addChild(
                'home',
                Mage::getBlock('core/layout')->setTemplate('page/home.phtml')
            );
        $layout->getChild('head')->addCss('header.css')
            ->addCss('page/home.css');
        $layout->toHtml();
    }
}