<?php

class Calculator_Controller_Calculator extends Core_Controller_Front_Action
{
    protected $_allowedAction = ['form'];
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        
        $loanCalcBlock = $layout->createBlock('calculator/calculator');
        $child->addChild('form', $loanCalcBlock);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('calculator');
        $result = Mage::getModel('calculator/calculator')->addData('session_id', 1)
        ->setData($data)
        ->save();
        if($result){
            
        }
        $this->setRedirect('calculator/calculator/form');
    }   
}