<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function setFormCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('form.css');
    }
    public function formAction()
    {
        $this->setFormCss();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('catalog/admin_category_form');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $categoryData = $this->getRequest()->getParams('catalog_category');
        Mage::getModel('catalog/category')
            ->setData($categoryData)
            ->save();
    }
    public function deleteAction()
    {
        Mage::getModel('catalog/category')
            ->setId($this->getRequest()->getParams('id'))
            ->delete();
    }
}