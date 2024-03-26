<?php

class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{
    protected $_allowedActions = [];
    public function __construct() {
        $this->init();
        $layout = $this->getLayout();
        $layout->setTemplate('core/admin.phtml');
        $header = Mage::getBlock('page/header')->setTemplate('page/admin/header.phtml');
        $layout->addChild('header', $header);
        $layout->getChild('head')->addCss('admin/left.css')->addJs('left.js');
    }
    public function init()
    {
        $session = Mage::getSingleton('core/session');
        if (!in_array($this->getRequest()->getActionName(), $this->_allowedActions) && !$session->get('admin_id')) {
            $this->setRedirect('admin/user/login');
        }
        return $this;
    }
}