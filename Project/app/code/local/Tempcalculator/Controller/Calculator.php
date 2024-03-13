<?php

class Tempcalculator_Controller_Calculator extends Core_Controller_Front_Action
{
    protected $_allowedAction = ['form'];
    public function formAction()
    {
        $layout = $this->getLayout();
        $tempCalcBlock = Mage::getBlock('tempcalculator/calculator');
        $child = $layout->getChild('content');
        $child->addChild('form', $tempCalcBlock);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('temp_calculator');
        Mage::getModel('tempcalculator/calculator')
            ->addData('session_id', 1)
            ->setData($data)
            ->save();
    }
}
