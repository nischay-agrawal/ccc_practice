<?php

class Page_Block_Header extends Core_Block_Template {

   protected $link = '';

   public function __construct(){
        $this->setTemplate('page/header.phtml');
   }

   public function logInOutText(){
      if(empty(Mage::getSingleton('core/session')->get('logged_in_customer_id'))){
         $logInOutText = 'Log-in';
         $this->link = Mage::getBaseUrl('customer/account/login');
      }else{
         $logInOutText = 'Log-out';
         $this->link = Mage::getBaseUrl('customer/account/logout');
      }
      return $logInOutText;
   }

   public function getCategoryData(){
      return Mage::getModel('catalog/category')->getCollection();
   }

   public function getItemData(){
      $quoteId = Mage::getSingleton('core/session')->get('quote_id');
      return Mage::getModel('sales/quote_item')->getCollection()
          ->addFieldToFilter('quote_id', $quoteId);
   }
}