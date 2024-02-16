<?php

class Core_Block_Layout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('core/1column.phtml');
        $this->prepareChildren();
        // return $this;
    }
    public function prepareChildren()
    {
        $head = $this->createBlock('page/head');
        $this->addChild('head', $head);
        $header = $this->createBlock('page/header');
        $this->addChild('header', $header);
        $footer = $this->createBlock('page/footer');
        $this->addChild('footer', $footer);
        $content = $this->createBlock('page/content');
        $this->addChild('content', $content);
        $messages = $this->createBlock('core/template');
        $messages->setTemplate('core/messages.phtml');
        $this->addChild('messages', $messages);

    }
    public function createBlock($className)
    {
        return Mage::getBlock($className);
    }
    
}
