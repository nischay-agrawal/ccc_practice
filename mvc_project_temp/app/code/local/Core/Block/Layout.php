<?php

class Core_Block_Layout extends Core_Block_Template{


    public function __construct(){  
        
         $this->setTemplate('core/1column.phtml');
        
        $this->prepareChildren();
    }

    public function prepareChildren(){
        $header = $this->createBlock('page/Header');
        $this->addChild('header',$header);
        $footer = $this->createBlock('page/Footer');
        $this->addChild('footer',$footer);
        $content = $this->createBlock('page/Content');
        $this->addChild('content',$content);
        $head = $this->createBlock('page/Head');
        $this->addChild('head',$head);

        $left2 = $this->createBlock('admin/adminleft');
        $this->addChild('adminleft',$left2);

        $massages = $this->createBlock('core/template');
        $massages->setTemplate('core/massages.phtml');
        $this->addChild('massages',$massages);

        // print_r($formProduct);
    }

    public function createBlock($className){
        return Mage::getBlock($className);
    }

    public function getRequest(){
        return  Mage::getModel('core/request');
    }

}