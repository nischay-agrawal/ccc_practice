<?php

class Cart_Controller_Checkout extends Core_Controller_Front_Action{
    

    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('cart/view.css')
            ->addCss('1columnMain.css');
    }


    public function viewAction(){
        $layout = $this->getLayout();
        $this->getCss();

        $child = $layout->getChild('content');
        $viewCart = $layout->createBlock('cart/cartview');
        $child->addChild('viewCart', $viewCart);

        $layout->toHtml();
    }

}