<?php

class Customer_Controller_Account extends Core_Controller_Front_Action
{

    protected $_allowedAction = ['register','login'];


    public function init(){
        $action = $this->getRequest()->getActionName();
        if(!in_array($action, $this->_allowedAction) &&
                !Mage::getSingleton('core/session')->get('logged_in_customer_id')
        ){
            $this->getRequest()->redirect('customer/account/login');
        }
    }

    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('product/form.css')
            ->addCss('product/list.css')
            ->addCss('1columnMain.css')
            ->addCss('customer/account/login.css')
            ->addCss('customer/account/dashboard.css');
    }

    public function registerAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $registerForm = $layout->createBlock('customer/account_register');
        $child->addChild('registerForm', $registerForm);
        $layout->toHtml();
    }

    public function loginAction()
    {

        if (!$this->getRequest()->isPost()) {
            if(Mage::getSingleton('core/session')->get('logged_in_customer_id') == ''){
                $layout = $this->getLayout();
                $this->getCss();
                $child = $layout->getChild('content');
                $loginForm = $layout->createBlock('customer/account_login');
                $child->addChild('loginForm', $loginForm);
                $layout->toHtml();
            }else{
                $this->getRequest()->redirect('customer/account/dashboard');
            }
        } else {
            $data = $this->getRequest()->getParams('login');
            $customerModel = Mage::getSingleton('customer/account')->getCollection()
                ->addFieldToFilter('customer_email', $data['email'])
                ->addFieldToFilter('password', $data['password']);
            $dataModel = $customerModel->getData();
            if (sizeof($dataModel) == 0) {
                echo "User Is not Exist! Please Enter Correct Details..";
                echo '<a href="' . Mage::getBaseUrl('customer/account/register') . '">Click to Sing Up</a>';
            } else {
                foreach ($dataModel as $data) {
                    Mage::getSingleton('core/session')->set('logged_in_customer_id', $data->getCustomerId());
                    $this->getRequest()->redirect('customer/account/dashboard');
                }
            }
        }

    }

    public function saveAction()
    {
        try {
            $data = $this->getRequest()->getParams('customer');
            $productModel = Mage::getModel('customer/account')
                ->setData($data)
                ->save();
            $this->getRequest()->redirect('customer/account/login');
        } catch (Exception $e) {
            echo "Error in saveAction method: " . $e->getMessage();
        }
    }

    public function dashboardAction()
    {
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        if ($customerId) {
            $layout = $this->getLayout();
            $this->getCss();
            $child = $layout->getChild('content');
            $dashboard = $layout->createBlock('customer/account_dashboard');
            $child->addChild('dashboard', $dashboard);
            $layout->toHtml();
        } else {
            echo "User Is not Exist! Please Enter Correct Details..";
            echo '<a href="' . Mage::getBaseUrl('customer/account/login') . '">Click to Login</a>';
        }
    }

    public function forgotPasswordAction()
    {
       
    }

    public function logoutAction(){
        Mage::getSingleton('core/session')->remove('logged_in_customer_id');
        $this->redirect('page/index/index');
    }

}

