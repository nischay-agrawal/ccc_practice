<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('product/form.css');
        $categoryForm = Mage::getBlock("catalog/admin_category_form");
        if ($this->getRequest()->getParams('id'))
            $data = Mage::getModel('catalog/category')->getResource()->load($this->getRequest()->getParams('id'));
        $categoryForm->setData(Mage::getModel('catalog/category')->setData((isset ($data)) ? $data : null));
        $layout->getChild('content')->addChild('categoryForm', $categoryForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getPostData('category');
        Mage::getModel("catalog/category")->setData($data)->save();
        $this->setRedirect("admin/catalog_category/list");
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams("id");
        Mage::getModel("catalog/category")->setId($id)->delete();
        $this->setRedirect("admin/catalog_category/list");
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('product/list.css');
        $layout->getChild('content')
            ->addChild("categoryList", Mage::getBlock("catalog/admin_category_list"));
        $layout->toHtml();
    }

    public function viewAction()
    {

    }
}