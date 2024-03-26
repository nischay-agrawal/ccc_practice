<?php

class Catalog_Controller_Category extends Core_Controller_Front_Action
{
    public function viewAction(){
        $layout = $this->getLayout();
        $layout->getChild('header')->setTemplate('page/header-1.phtml');
        $categoryId = $this->getRequest()->getParams('id');
        $categoryView = Mage::getBlock('catalog/category');
        $productCollection = Mage::getModel('catalog/product')->getCollection();
        if($categoryId != ''){
            $productCollection->addFieldToFilter('category_id', $categoryId);
            $categoryView->addData('categoryName', Mage::getBlock('catalog/admin_product_list')->getCategoryName($categoryId));
        }
        $products = $productCollection->getData();
        $categoryView->addData('products', $products);
        $layout->getChild('content')->addChild('categoryView', $categoryView);

        $layout->getChild('head')->addCss('catalog/category.css')->addCss('header_1.css');
        $layout->toHtml();
    }
}