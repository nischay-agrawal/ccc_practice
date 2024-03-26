<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    protected $_allowedActions = ["add", "remove", "edit"];
    public function addAction()
    {
        $request = $this->getRequest()->getPostData();
        Mage::getModel('sales/quote')->addProduct($request);
        $this->setRedirect('cart');
    }

    public function removeAction()
    {
        $request = $this->getRequest()->getPostData();
        Mage::getModel('sales/quote')->removeProduct($request);
        $this->setRedirect('cart');
    }

    public function editAction()
    {
        $request = $this->getRequest()->getPostData();
        Mage::getModel('sales/quote')->editProduct($request);
        $this->setRedirect('cart');
    }
    public function orderAction()
    {
        $request = $this->getRequest()->getPostData();
        $quote = Mage::getModel( 'sales/quote' );
        $quote->addAddress($request["checkoutAddress"]);
        $quote->addPaymentMethod($request["checkoutPayment"]);
        $quote->addShippingMethod($request["checkoutShipping"]);
        $quote->convert();
        Mage::getSingleton('core/session')->remove("quote_id");
        $this->setRedirect('cart');
    }
}