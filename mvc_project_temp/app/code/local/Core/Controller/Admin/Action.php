<?php

class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{


    protected $_allowedAction = [];

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        
        $layout = $this->getLayout();
        $layout->setTemplate('admin/admin.phtml');
        $child = $layout->getChild('adminleft');
        $admin = $layout->createBlock('admin/header');
        $child->addChild('header', $admin);

        $child2 = $layout->getChild('content');
        $adminH = $layout->createBlock('admin/adminheader');
        $child2->addChild('header', $adminH);

        $action = $this->getRequest()->getActionName();
        if (
            !in_array($action, $this->_allowedAction) &&
            !Mage::getSingleton('core/session')->get('logged_in_admin_id')
        ) {
            $this->getRequest()->redirect('admin/user/login');
        }
        return $this;
    }


}