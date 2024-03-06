<?php

class Admin_Controller_Currency_Rate extends Core_Controller_Front_Action
{

    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('product/form.css')
            ->addCss('product/list.css')
            ->addCss('1columnMain.css');
    }

    public function formAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $rateForm = $layout->createBlock('currency/admin_rate_form');
        $child->addChild('form', $rateForm);
        $layout->toHtml();
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $rateList = $layout->createBlock('currency/admin_rate_list');
        $child->addChild('list', $rateList);
        $layout->toHtml();

    }

    public function deleteAction(){
        $id = $this->getRequest()->getParams('id');
        $rate = Mage::getModel('currency/rate')->load($id);
        $rate->delete();
        $this->getRequest()->redirect('admin/currency_rate/list');
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getParams('currency_rate');
        $productModel = Mage::getModel('currency/rate');
        $productModel->setData($data);
        $productModel->save();
        $this->getRequest()->redirect('admin/currency_rate/list');
    }

}
