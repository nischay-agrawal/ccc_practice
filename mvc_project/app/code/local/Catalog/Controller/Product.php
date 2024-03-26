<?php

class Catalog_Controller_Product extends Core_Controller_Front_Action
{
    public function viewAction(){
        $layout = $this->getLayout();
        $layout->getChild('header')->setTemplate('page/header-1.phtml');
        $productId = $this->getRequest()->getParams('id');
        $product = Mage::getModel('catalog/product')->load($productId);
        $productView = Mage::getBlock('catalog/product')->addData('product', $product);
        $layout->getChild('content')->addChild('productView', $productView);
        $layout->getChild('head')->addCss('catalog/product.css')->addCss('header_1.css');
        $layout->toHtml();
    }

    public function updateAction(){
        $data = Mage::getModel("catalog/product")->getCollection()->getData();
        foreach($data as $_product){
            $_product->addData("link", "http://localhost/practise/mvc_project/catalog/product/view?id=".$_product->getId())->save();
        }
    }
}