<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('1columnMain.css');
    }


    public function addAction(){
      $data = $this->getRequest()->getParams();
      Mage::getSingleton('sales/quote')->addProduct($data);
      $this->redirect('cart/checkout/view');
    }


    public function deleteAction(){
      $deleteId = $this->getRequest()->getParams('id');
      Mage::getSingleton('sales/quote')->removeProduct($deleteId);
      $this->redirect('cart/checkout/view');
    }

    public function updateAction(){
      $updateData = $this->getRequest()->getParams();
      Mage::getSingleton('sales/quote')->updateProduct($updateData);
      $this->redirect('cart/checkout/view');
    } 


}
