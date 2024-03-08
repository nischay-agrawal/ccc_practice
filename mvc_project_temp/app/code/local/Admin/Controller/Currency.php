<?php


class Admin_Controller_Currency extends Core_Controller_Front_Action
{

    public function getCss()
    {
        $layout = $this->getLayout();

        $layout->getChild('head')->addCss('1columnMain.css');

    }


    public function listAction(){
        $layout = $this->getLayout();
        $this->getCss();
        $currencyList = $layout->createBlock('currency/adminlist');
        $content = $layout->getChild('content')
            ->addChild('currencyList', $currencyList);
        $layout->toHtml();
    }

    public function deleteAction(){
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('currency/userCurrency')->load($id);
        $product->delete();
        $this->redirect('admin/currency/list');
    }
}
