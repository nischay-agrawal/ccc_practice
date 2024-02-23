<?php
class Core_Model_Request
{
    protected $_moduleName;
    protected $_controllerName;
    protected $_actionName;
    public function __construct()
    {
        $uri = $this->getRequestUri();
        $uri = array_filter(explode("/", $uri));
        $this->_moduleName = isset($uri[0]) ? $uri[0] : 'page';
        $this->_controllerName = isset($uri[1]) ? $uri[1] : 'index';
        $this->_actionName =  isset($uri[2]) ? $uri[2] : 'index';
    }
    public function getParams($key = '')
    {
        return ($key == '')
            ? $_REQUEST
            : (isset($_REQUEST[$key])
                ? $_REQUEST[$key]
                : ''
            );
    }
    public function getPostData($key = '')
    {
        return ($key == '')
            ? $_POST
            : (isset($_POST[$key])
                ? $_POST[$key]
                : ''
            );
    }
    public function getQueryData($key = '')
    {
        return ($key == '')
            ? $_GET
            : (isset($_GET[$key])
                ? $_GET[$key]
                : ''
            );
    }
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }
        return false;
    }
    public function getRequestUri()
    {
        $requst = $_SERVER["REQUEST_URI"];
        $uri = str_replace("/practise/MVCProject/", "", $requst);
        $uri = stristr($uri, '?', True);
        return $uri;
    }
    // public function getRequestUri(){
    //     $uri = $_SERVER['REQUEST_URI'];
    //     $uri = str_replace("/practise/MVCProject/","",$uri);
    //     if(str_contains($uri, '?'))
    //     {
    //         $pos = strpos($uri, '?');
    //         $temp_uri = substr($uri,$pos);
    //         $uri = str_replace($temp_uri,"",$uri);
    //         return $uri;
    //     }
    //     return $uri;
    // }
    public function getModuleName()
    {
        return $this->_moduleName;
    }
    public function getControllerName()
    {
        return $this->_controllerName;
    }
    public function getActionName()
    {
        return $this->_actionName;
    }
    public function getFullControllerClass()
    {
        return ucfirst($this->_moduleName) . "_Controller_" . ucfirst($this->_controllerName);
    }
}
