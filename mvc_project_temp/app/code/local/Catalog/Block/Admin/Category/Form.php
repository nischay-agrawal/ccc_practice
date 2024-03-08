<?php 

class Catalog_Block_Admin_Category_Form extends Core_Block_Template{
    
    public function __construct(){
        $this->setTemplate('catalog/admin/category/form.phtml');
    }

    public function getCategoryData()
    {
        return Mage::getModel('catalog/category')->load($this->getRequest()->getParams('id',0));
    }
}