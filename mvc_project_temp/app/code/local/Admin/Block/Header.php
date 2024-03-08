<?php

class Admin_Block_Header extends Core_Block_Template {

   protected $link = '';

   public function __construct(){
        $this->setTemplate('admin/header.phtml');
   }

   public function logInOutText(){
      if(empty(Mage::getSingleton('core/session')->get('logged_in_admin_id'))){
         $logInOutText = 'LogIn';
         $this->link = Mage::getBaseUrl('admin/user/login');
      }else{
         $logInOutText = 'LogOut';
         $this->link = Mage::getBaseUrl('admin/user/logout');
      }
      return $logInOutText;
   }
}