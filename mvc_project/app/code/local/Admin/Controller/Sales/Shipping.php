<?php

class Admin_Controller_Sales_Shipping extends Core_Controller_Admin_Action{
    protected $_allowedActions = [];
    public function listAction(){
        $layout = $this->getLayout();
        $content = $layout->getChild("content");
        $layout->getChild('head')->addCss('sales/admin/shipping/list.css');
        $shippingList = $layout->createBlock("sales/admin_shipping_list");
        $content->addChild("shippingList", $shippingList);
        $layout->toHtml();
    }
    public function formAction(){
        $layout = $this->getLayout();
        $content = $layout->getChild("content");
        $layout->getChild('head')->addCss('sales/admin/shipping/form.css');
        $shippingForm = $layout->createBlock("sales/admin_shipping_form");
        $content->addChild("shippingForm", $shippingForm);
        $layout->toHtml();
    }
    public function saveAction(){
        $request = $this->getRequest()->getPostData("shipping");
        Mage::getModel("sales/shipping")->setData($request)->save();
        $this->setRedirect(Mage::getBaseUrl("admin/sales_shipping/list"));
    }
    public function deleteAction(){
        $request = $this->getRequest()->getParams("id");
        Mage::getModel("sales/shipping")->setId($request)->delete();
        $this->setRedirect(Mage::getBaseUrl("admin/sales_shipping/list"));
    }
}