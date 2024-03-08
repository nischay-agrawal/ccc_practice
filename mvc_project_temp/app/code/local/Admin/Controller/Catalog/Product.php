<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{


    protected $_allowedAction = [];

    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('admin/header.css')
            ->addCss('product/form.css')
            ->addCss('product/list.css')
            ->addCss('adminMain.css');
    }


    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }

    public function formAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->toHtml();
    }

    public function deleteAction(){
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('catalog/product')->load($id);
        $product->delete();
        $this->redirect('admin/catalog_product/list');
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_product');

        $fileName = $_FILES["catalog_product"]["name"]['image_link'];
        $uploadFile = Mage::getBaseDir('media/product/') .$_FILES["catalog_product"]["name"]['image_link'] ;
        $data['image_link'] = $fileName;
        move_uploaded_file($_FILES["catalog_product"]["tmp_name"]['image_link'], $uploadFile);
        
        $productModel = Mage::getModel('catalog/product');
        $productModel->setData($data);
        $productModel->save();
        // $newItemId = $productModel->getId();
        $this->redirect('admin/catalog_product/list');
    }

}
