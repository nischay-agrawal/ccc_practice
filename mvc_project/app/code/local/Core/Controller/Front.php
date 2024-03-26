<?php

class Core_Controller_Front{
    public function init(){
        $request = Mage::getModel("core/request");
        $fullClassName = $request->getFullControllerClass();
        $controller = new $fullClassName();
        $actionName = $request->getActionName()."Action";
        $controller->$actionName();
    }
}