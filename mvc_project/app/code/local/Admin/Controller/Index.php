<?php

class Admin_Controller_Index extends Core_Controller_Admin_Action
{
    protected $_allowedActions = [];
    public function indexAction(){
        $layout = $this->getLayout();
        $dashboard = $layout->createBlock('core/template')->setTemplate('page/admin/dashboard.phtml');
        $layout->getchild('content')->addChild('dashboard', $dashboard);
        $layout->toHtml();
    }
}