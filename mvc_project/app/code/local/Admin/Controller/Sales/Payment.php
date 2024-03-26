<?php

class Admin_Controller_Sales_Payment extends Core_Controller_Admin_Action{
    protected $_allowedActions = [];
    public function listAction(){
        $layout = $this->getLayout();
        $content = $layout->getChild("content");
        $layout->getChild('head')->addCss('sales/admin/payment/list.css');
        $paymentMethods = $layout->createBlock("sales/admin_payment_list");
        $content->addChild("productList", $paymentMethods);
        $layout->toHtml();
    }
    public function formAction(){
        $layout = $this->getLayout();
        $content = $layout->getChild("content");
        $layout->getChild('head')->addCss('sales/admin/payment/form.css');
        $paymentForm = $layout->createBlock("sales/admin_payment_form");
        $content->addChild("productForm", $paymentForm);
        $layout->toHtml();
    }
    public function saveAction(){
        $request = $this->getRequest()->getPostData("payment");
        Mage::getModel("sales/payment")->setData($request)->save();
        $this->setRedirect(Mage::getBaseUrl("admin/sales_payment/list"));
    }
    public function deleteAction(){
        $request = $this->getRequest()->getParams("id");
        Mage::getModel("sales/payment")->setId($request)->delete();
        $this->setRedirect(Mage::getBaseUrl("admin/sales_payment/list"));
    }
}