<?php

class Admin_Block_Adminheader extends Core_Block_Template {

    public $text = "";
    public $link = "";

    public function __construct(){
         $this->setTemplate('admin/adminHeader.phtml');
    }

    public function getDataText(){
        $action = Mage::getModel('core/request')->getControllerName();
        if($action == 'catalog_product'){
            $this->text = 'Add New Product';
            $this->link = Mage::getBaseUrl('admin/catalog_product/form');
        }elseif ($action == 'banner') {
            $this->text = 'Add New Banner';
            $this->link = Mage::getBaseUrl('admin/banner/form');
        }elseif  ($action == 'catalog_category') {
            $this->text = 'Add New Category';
            $this->link = Mage::getBaseUrl('admin/catalog_category/form');
        }else{
            $this->text = '';
        }
    }
}