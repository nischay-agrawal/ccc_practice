<?php


class Core_Model_Request{


    protected $_moduleName;
    protected $_controllerName;
    protected $_actionName;

    public function __construct()
	{
		$uri = $this->getRequestUri();
		$uri = array_filter(explode("/", $uri));
		$this->_moduleName = isset($uri[0]) ? $uri[0] : 'page';
		$this->_controllerName = isset($uri[1]) ? $uri[1] : 'index';
		$this->_actionName = isset($uri[2]) ? $uri[2] : 'index';
	}


    public function getParams($key = '', $arg=null){
        return ($key == '')
            ? $_REQUEST
            : (isset($_REQUEST[$key])
                ? $_REQUEST[$key]
                : ((!is_null($arg)) ? $arg : '')
            );
    }

    public function getPostData($key= ''){
        return ($key == '')
                ? $_POST
                : (isset($_POST[$key])
                    ? $_POST[$key]
                    : '');
    }

    public function getQueryData($key= ''){
        return ($key == '')
                ? $_GET
                : (isset($_GET[$key])
                    ? $_GET[$key]
                    : ''
                );
    }

    public function isPost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        return false;
    }

    public function getRequestUri(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace("/practise/mvc_project_temp/","",$uri);
        if(str_contains($uri, '?'))
        {
            $pos = strpos($uri, '?');
            $temp_uri = substr($uri,$pos);
            $uri = str_replace($temp_uri,"",$uri);
            return $uri;
        }
        return $uri;
    }

    public function getActionName(){
        return $this->_actionName;
    }
    public function getControllerName(){
        return $this->_controllerName;
    }
    public function getModuleName(){
        return $this->_moduleName;
    }


    public function getFullControllerClass(){
        $strClass = $this->_moduleName.'_Controller_'.$this->_controllerName;
        $strClass = ucwords($strClass,"_");
        return $strClass;
    }

    public function getUrl($path){
        return "http://localhost/practise/mvc_project_temp/".$path;
    }

    public function redirect($url){
        return header("Location: " . Mage::getBaseUrl($url));
    }
}