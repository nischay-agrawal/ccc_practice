<?php

class Core_Controller_Front{
    public function init(){
        $requestModel = Mage::getModel('core/request');
        $actionName = $requestModel->getActionName();
        $actionName .= 'Action';

        $fullClassName = $requestModel->getFullControllerClass();
        $Layout = new $fullClassName();
        $Layout->$actionName();
    }
}