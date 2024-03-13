<?php
class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    public function includeFile($newFile)
    {
        $newFile->addCss("cart/checkout.css");
    }
    public function formAction()
    {
        $layout = $this->getLayout();
        $newFile = $layout->getChild('head');
        $this->includeFile($newFile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('cart/checkout');
        $child->addChild('form',$productForm);
        $layout->toHtml();
    }
}