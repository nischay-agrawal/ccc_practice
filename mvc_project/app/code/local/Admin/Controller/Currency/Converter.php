<?php

class Admin_Controller_Currency_Converter extends Core_Controller_Front_Action
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
        $converterForm = $layout->createBlock('currency/admin_converter_form');
        $child->addChild('form', $converterForm);
        $layout->toHtml();
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $converterList = $layout->createBlock('currency/admin_converter_list');
        $child->addChild('list', $converterList);
        $layout->toHtml();
    }

    public function deleteAction(){
        $id = $this->getRequest()->getParams('id');
        $converter = Mage::getModel('currency/converter')->load($id);
        $converter->delete();
        $this->getRequest()->redirect('admin/currency_converter/list');
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getParams('currency_converter');
        $converterModel = Mage::getModel('currency/converter');
        $converterModel->setData($data);
        $converterModel->save();
        $newItemId = $converterModel->getId();
        $this->getRequest()->redirect('admin/currency_converter/list?highlighted_id='.$newItemId);
    }

}
