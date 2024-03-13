<?php

class loancalculator_Controller_Calculator extends Core_Controller_Front_Action
{
    protected $_allowedAction = ['form'];
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        
        $loanCalcBlock = $layout->createBlock('loancalculator/calculator');
        $child->addChild('form', $loanCalcBlock);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('loan_calculator');
        Mage::getModel('loancalculator/calculator')->addData('session_id', 1)
        ->setData($data)
        ->save();
    }
    public function calculateResult(){
        echo "<pre>";
        $layout = $this->getLayout();
        $loanData = Mage::getModel('loancalculator/calculator')->getCollection()->getData();
    }
    // public function deleteAction()
    // {
    //     $productId = $this->getRequest()->getParams('product_id');
    //     Mage::getModel('catalog/product')
    //         ->load($productId)->delete();
    // }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('loancalculator/list.css');
        $child = $layout->getChild('content');

        $productList = $layout->createBlock('catalog/admin_product_list');

        $child->addChild('list', $productList);
        $layout->toHtml();
    }
}