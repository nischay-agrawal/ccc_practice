<?php

class Currency_Block_Result extends Core_Block_Template {

    public function __construct(){
         $this->setTemplate('currency/result.phtml');
    }

    public function getUserData(){

          return Mage::getModel('currency/usercurrency')->load($this->getRequest()->getParams('id'));   
                    // ->addFieldToFilter('id',$this->getRequest()->getParams('id'));

    }
 
 }