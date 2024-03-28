<?php

class Branchzip_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $formBlock = Mage::getBlock('branchzip/branchzip');
        $layout->getChild('content')->addChild('form', $formBlock);
        $layout->toHtml();
    }
}