<?php
    class Core_Controller_Front{
        public function init(){
            $coreModelRequest = Mage::getModel("core/request");
            // echo $coreModelRequest->getModuleName();
            // echo $coreModelRequest->getControllerName();
            // echo $coreModelRequest->getActionName();
            $fullControllerName = $coreModelRequest->getFullControllerClass();
            $actionName = $coreModelRequest->getActionName();
            $actionName .= "Action";
            // echo $actionName;
            // echo $fullControllerName;
            $controller = new $fullControllerName();
            $controller->$actionName();

        }
    }
?>