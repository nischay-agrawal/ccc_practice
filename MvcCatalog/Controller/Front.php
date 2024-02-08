<?php

class Controller_Front{
    public function init(){
        $requestModel = new Model_Request();
        $uri = $requestModel->requestUri();
        // echo $uri;
        $className = str_replace("/", "_", $uri);
        $className = "View_" . $className;

        // echo $className;
        $layout = new $className();
        print_r($layout->toHtml());
    }
}