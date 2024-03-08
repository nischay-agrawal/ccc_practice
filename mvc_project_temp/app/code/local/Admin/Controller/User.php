<?php

class Admin_Controller_User extends Core_Controller_Admin_Action
{

    protected $_allowedAction = ['login', 'index'];

    public function getCss()
    {
        $layout = $this->getLayout();

        $layout->getChild('head')
            ->addCss('admin/header.css')
            ->addCss('customer/account/login.css')
            ->addCss('adminMain.css');

    }

    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $homeIndex = $layout->createBlock('admin/home');
        $child->addChild('homeIndex', $homeIndex);
        $layout->toHtml();
    }

    public function loginAction()
    {
        if (!$this->getRequest()->isPost()) {
            if (Mage::getSingleton('core/session')->get('logged_in_admin_id') == '') {
                $layout = $this->getLayout();
                $this->getCss();
                $child = $layout->getChild('content');
                $adminLogin = $layout->createBlock('admin/login');
                $child->addChild('adminLogin', $adminLogin);
                $layout->toHtml();
            } else {
                $this->getRequest()->redirect('admin/user/index');
            }
        } else {
            $userid = 10;
            $data = $this->getRequest()->getParams('login');

            if ($data['email'] == 'jinil@gmail.com' && $data['password'] == '123456') {
                Mage::getSingleton('core/session')->set('logged_in_admin_id', $userid);
                $this->redirect('admin/user/index');
            } else {
                echo "Sorry.. You are Not allowd To access admin Data!";
            }

        }
    }

    public function logoutAction(){
        Mage::getSingleton('core/session')->remove('logged_in_admin_id');
        $this->redirect('admin/user/index');
    }


}

