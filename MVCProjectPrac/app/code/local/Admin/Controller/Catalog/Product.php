<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function setFormCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('form.css');
    }
    public function formAction()
    {
        $layout = $this->getLayout();

        // $this->getCss();
        
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        if ($this->getRequest()->getParams('edit') !== '') {
            $id = $this->getRequest()->getParams('edit');
            $productData = Mage::getModel('catalog/product');
            $productData->load($id);
            $productForm->setProductData($productData);
        }
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_product');
        Mage::getModel('catalog/product')
            ->setData($data)
            ->save();
    }

    public function deleteAction()
    {
        Mage::getModel('catalog/product')
            ->setId($this->getRequest()->getParams('id'))
            ->delete();
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $this->setFormCss();
        $child = $layout->getChild('content');
        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->toHtml();
    }
}