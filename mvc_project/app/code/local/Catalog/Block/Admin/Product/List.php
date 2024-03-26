<?php

class Catalog_Block_Admin_Product_List extends Core_Block_Template
{
    protected $_categoryArray;
    public function __construct()
    {
        $this->setTemplate("catalog/admin/product/list.phtml");
    }
    public function getCategoryName($cat_id)
    {
        if (isset ($this->_categoryArray)) {
            return isset ($this->_categoryArray[$cat_id]) ? $this->_categoryArray[$cat_id] : '';
        } else {
            $this->_categoryArray = Mage::getModel('catalog/category')->getCategoryArray();
        }
        return isset ($this->_categoryArray[$cat_id]) ? $this->_categoryArray[$cat_id] : '';
    }

    public function getProducts()
    {
        $data = [];
        $productCollection = Mage::getModel('catalog/product')->getCollection();
        $data["size"] = sizeof(Mage::getModel('catalog/product')->getCollection()->getData());
        $data["limit"] = ($this->getRequest()->getParams('limit') == '') ? 10 : $this->getRequest()->getParams('limit');
        $data["start"] = ($this->getRequest()->getParams('s') == '') ? 0 : $this->getRequest()->getParams('s');
        $data["products"] = $productCollection->addLimit($data["limit"], $data["start"])->getData();
        $data["pages"] = ceil($data["size"] / $data["limit"]);
        $data["end"] = min($data["start"] + $data["limit"], $data["size"]);
        return $data;
    }
}