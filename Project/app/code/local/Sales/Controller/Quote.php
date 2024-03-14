<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        $quoteData = $this->getRequest()
            ->getParams('sales_quote');
        Mage::getSingleton("sales/quote")
            ->addProduct($quoteData);
        $this->setRedirect('cart');
    }
    public function deleteAction()
    {
        Mage::getSingleton("sales/quote")
            ->deleteProduct(
                $this->getRequest()
                    ->getParams('item_id')
            );
        $this->setRedirect('cart');
    }
    public function saveAction()
    {
        $request = $this->getRequest()->getPostData();
        Mage::getModel("sales/quote")->convert($request);
        Mage::getSingleton("core/session")->remove("quote_id");
        $this->setRedirect("catalog/product/view");
    }
}