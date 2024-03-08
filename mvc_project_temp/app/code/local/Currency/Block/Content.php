<?php

class Currency_Block_Content extends Core_Block_Template {

    public function __construct(){
         $this->setTemplate('currency/content.phtml');
    }

    public function getCountryData(){

          return Mage::getModel('currency/currency')->getCollection();
    }

    public function getToCountryData(){
      
      return Mage::getModel('currency/currency')->getCollection();
    }
 
 }