<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{
    protected $_allowedActions = [];
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")
            ->addCss("product/form.css")
            ->addJs("product/form.js");
        $productForm = $layout->createBlock('catalog/admin_product_form');
        if ($this->getRequest()->getParams('id'))
            $data = Mage::getModel('catalog/product')->getResource()->load($this->getRequest()->getParams('id'));
        $productForm->setData(Mage::getModel('catalog/product')->setData(isset ($data) ? $data : null));
        $layout->getChild("content")->addChild('productForm', $productForm);
        $layout->toHtml();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPostData('product');
        if ($_FILES['image_link']['error'] == 0)
            $data['image_link'] = Mage::uploadFile($_FILES['image_link'], 'products/');
        Mage::getModel("catalog/product")->setData($data)->save();
        $this->setRedirect("admin/catalog_product/list");
    }
    public function deleteAction()
    {
        $productId = $this->getRequest()->getParams("id");
        Mage::getModel("catalog/product")->load($productId)->delete();
        $this->setRedirect("admin/catalog_product/list");
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('product/list.css');
        $layout->getChild("content")
            ->addChild("productList", $layout->createBlock("catalog/admin_product_list"));
        $layout->toHtml();
    }

    public function viewAction()
    {
        $id = Mage::getModel('core/request')->getParams('id');
        $product = Mage::getModel('catalog/product')->load($id);
        // ajax temporary code for practice
        // display product popup on click on view button in admin product list
        echo "<img src='" . Mage::getBaseUrl('media/products/' . $product->getImageLink()) . "' height='30px' />" .
            "<p>SKU: " . $product->getSku() . "</p>" .
            "<p style='font-weight: 600'>" . $product->getName() . "</p>" .
            "<p>" . $product->getdescription() . "</p>" .
            "<p>Price: " . $product->getPrice() . "</p>";
    }
    public function fillAction()
    {
        $products = Mage::getModel("catalog/product")->getCollection()->getData();
        foreach ($products as $product) {
            $product->addData("inventory", 100)->save();
        }
    }
}