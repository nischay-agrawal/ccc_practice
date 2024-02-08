<?php
    class Core_Controller_Front{
        public function init(){
            $coreModelRequest = new Core_Model_Request();
            // echo $coreModelRequest->getModuleName();
            // echo $coreModelRequest->getControllerName();
            // echo $coreModelRequest->getActionName();
            
            $fullControllerName = $coreModelRequest->getFullControllerClass();

            // echo $fullControllerName;

            $obj = new $fullControllerName();
            $obj->indexAction();

        }
    }
?>