<?php
class Core_Model_Request
{
	protected $_controllerName, $_actionName, $_moduleName;
	public function __construct()
	{
		$requestUri = $this->getRequestUri();
		$requestUri = array_filter(explode("/", $requestUri));
		// print_r($requestUri);
		$this->_moduleName = isset($requestUri[0]) ? $requestUri[0] : "page";
		$this->_controllerName = isset($requestUri[1]) ? $requestUri[1] : "index";
		$this->_actionName = isset($requestUri[2]) ? $requestUri[2] : "index";
		// echo "<br>"."". $this->_moduleName ."". $this->_controllerName ."<br>";
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

	public function getRequestUri($key = '')
	{
		$url = $_SERVER['REQUEST_URI'];
		$url = str_replace('/practise/MVC_Project/', "", $url);
		return $url;
	}

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
		$this->_moduleName = ucwords($this->_moduleName);
		$this->_controllerName = ucwords($this->_controllerName);

		return ($this->_moduleName . "_Controller_" . $this->_controllerName . "");
	}
}


