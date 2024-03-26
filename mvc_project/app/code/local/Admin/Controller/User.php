<?php

class Admin_Controller_User extends Core_Controller_Admin_Action
{
    protected $_allowedActions = ['login'];
    public function loginAction()
    {
        if(!$this->getRequest()->isPost()){
            $layout = $this->getLayout();
            $layout->getChild('content')
                ->addChild('adminLogin', Mage::getBlock('user/admin_login'));
            $layout->toHtml();
        }else{
            $adminData = $this->getRequest()->getPostData('adminlogin');
            if($adminData['email'] == 'admin@gmail.com' && $adminData['password'] == 'root'){
                Mage::getSingleton('core/session')->set('admin_id', 10);
                $this->setRedirect('admin');
            }else{
                $this->setRedirect('admin/user/login');
            }
        }
    }
    public function logoutAction(){
        Mage::getSingleton('core/session')->remove('admin_id');
        $this->setRedirect('admin/user/login');
    }

    public function listAction(){
        $layout = $this->getLayout();
        $userList = Mage::getBlock("customer/admin_user");
        $layout->getChild("content")->addChild("userList", $userList);
        $layout->toHtml();
    }
}