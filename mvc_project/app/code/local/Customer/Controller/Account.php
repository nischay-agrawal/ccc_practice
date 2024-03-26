<?php

class Customer_Controller_Account extends Core_Controller_Front_Action
{
    protected $_allowedActions = ['login', 'register'];
    public function registerAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('header')->setTemplate('page/header-1.phtml');
        $layout->getChild('head')->addCss('customer/register.css')->addCss('header_1.css');
        $layout->getChild('content')->addChild('registerForm', Mage::getBlock('customer/account_register'));
        $layout->toHtml();
    }

    public function saveAction()
    {
        $registerData = $this->getRequest()->getParams('register');
        Mage::getModel('customer/account')->setData($registerData)->save();
        $this->setRedirect('customer/account/login');
    }

    public function loginAction()
    {
        if (Mage::getSingleton('core/session')->get('logged_in_customer_id') != '')
            $this->setRedirect('');
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $layout->getChild('header')->setTemplate('page/header-1.phtml');
            $layout->getChild('head')->addCss('customer/login.css')->addCss('header_1.css');
            $layout->getChild('content')->addChild('loginForm', Mage::getBlock('customer/account_login'));
            $layout->toHtml();
        } else {
            $login = Mage::getModel('customer/account')
                ->setData($this->getRequest()->getPostData('login'))
                ->login();
            $this->setRedirect(($login) ? '' : 'customer/account/login');
        }
    }

    public function dashboardAction()
    {
        $session = Mage::getSingleton('core/session');
        if (!$session->get('logged_in_customer_id')) {
            $this->setRedirect('customer/account/login');
        } else {
            $layout = $this->getLayout();
            $layout->getChild('header')->setTemplate('page/header-1.phtml');
            $layout->getChild('head')->addCss('header_1.css');
            $account = Mage::getModel('customer/account');
            $customer = $account
                ->setData($account->getResource()->load($session->get('logged_in_customer_id')));
            $dashboard = Mage::getBlock('customer/account_dashboard')
                ->setData($customer);
            $layout->getChild('content')->addChild('dashboard', $dashboard);
            $layout->toHtml();
        }
    }

    public function forgotPasswordAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('content')
            ->addChild('forgotPassword', Mage::getBlock('customer/account_forgotPassword'));
        $layout->toHtml();
    }
    public function logoutAction()
    {
        Mage::getSingleton('core/session')->remove('logged_in_customer_id');
        Mage::getSingleton('core/session')->remove('quote_id');
        $this->setRedirect('');
    }
}