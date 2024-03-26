<?php

class Core_Controller_Front_Action
{
    protected $_allowedActions = ['index', 'view'];
    protected $_layout = null;
    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        $session = Mage::getSingleton('core/session');
        if (!in_array($this->getRequest()->getActionName(), $this->_allowedActions) && !$session->get('logged_in_customer_id')) {
            $this->setRedirect('customer/account/login');
        }
        return $this;
    }
    public function getLayout()
    {
        if (is_null($this->_layout)) {
            $this->_layout = Mage::getBlock('core/layout');
        }
        return $this->_layout;
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }

    public function setRedirect($url)
    {
        header("Location: " . Mage::getBaseUrl($url));
    }
}