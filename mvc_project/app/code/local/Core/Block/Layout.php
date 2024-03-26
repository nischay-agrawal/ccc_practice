<?php

class Core_Block_Layout extends Core_Block_Template
{
    public function __construct()
    {
        $this->prepareChildren();
        $this->setTemplate('core/1column.phtml');
    }
    public function prepareChildren()
    {
        $head = $this->createBlock('page/head');
        $header = $this->createBlock('page/header');
        $footer = $this->createBlock('page/footer');
        $content = $this->createBlock('page/content');
        if (Mage::getSingleton('core/session')->get('logged_in_customer_id')) {
            $customer = Mage::getModel('customer/account')->load(Mage::getSingleton('core/session')->get('logged_in_customer_id'));
            $header->addData('customer', $customer);
        }
        $this->addChild('header', $header);
        $this->addChild('footer', $footer);
        $this->addChild('content', $content);
        $this->addChild('head', $head);

        $messages = $this->createBlock('core/template');
        $messages->setTemplate('core/message.phtml');
        $this->addChild('message', $messages);
    }
    public function createBlock($className)
    {
        return Mage::getBlock($className);
    }
}