<?php

class Branchzip_Block_Branchzip extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("branchzip/form.phtml");
    }
    public function branchData()
    {
        return Mage::getModel('branchzip/branch')->getCollection()->getData();

    }
    public function zipData($branchId)
    {
        return Mage::getModel('branchzip/zipcode')->getCollection()->addFieldToFilter("branch_id",$branchId)->getData();
        
    }

}