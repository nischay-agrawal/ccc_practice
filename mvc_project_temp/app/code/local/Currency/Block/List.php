<?php

class Currency_Block_List extends Core_Block_Template {

    public function __construct(){
         $this->setTemplate('currency/list.phtml');
    }

    public function getUserData(){

          return Mage::getModel('currency/usercurrency')->getCollection();
                    // ->addFieldToFilter('id',$this->getRequest()->getParams('id'));

    }
 
 }