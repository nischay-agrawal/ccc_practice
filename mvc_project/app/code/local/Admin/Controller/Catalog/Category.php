<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{

    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('product/form.css')
            ->addCss('product/list.css')
            ->addCss('1columnMain.css');
    }

    public function formAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $categoryForm = $layout->createBlock('catalog/admin_category_form');
        $child->addChild('form', $categoryForm);
        $layout->toHtml();
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $categoryList = $layout->createBlock('catalog/admin_category_list');
        $child->addChild('list', $categoryList);
        $layout->toHtml();

    }

    public function deleteAction(){
        $id = $this->getRequest()->getParams('id');
        $category = Mage::getModel('catalog/category')->load($id);
        $category->delete();
        $this->getRequest()->redirect('admin/catalog_category/list');
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_category');
        $productModel = Mage::getModel('catalog/category');
        $productModel->setData($data);
        $productModel->save();
        $this->getRequest()->redirect('admin/catalog_category/list');
    }

}
