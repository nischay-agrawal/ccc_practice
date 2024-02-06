<?php
    class Controller_Front{
        public function init()
        {
            $modelRequest = new Model_Request();
            $request_uri = ($modelRequest->getRequestURI('REQUEST_URI'));
            $request_uri = ucwords($request_uri,"/");
            $request_uri = str_replace("/", "_", $request_uri);
            $request_uri = "View_".$request_uri;
            $request_uri = str_replace(".php", "", $request_uri);
            echo $request_uri;

            $layout = new $request_uri();
            $layout->toHTML();
        }
    }
?>