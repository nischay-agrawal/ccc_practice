<?php
    class Model_Request {
    	public function __construct(){
        
    	}
    
    	public function getParams($key = '') {
    		return ($key == '')
    			? $_REQUEST
    			: (isset($_REQUEST[$key])
    				? $_REQUEST[$key]
    				: ''
    			);
    	}
    
    	public function getPostData($key = '') {
    		return ($key == '')
    			? $_POST
    			: (isset($_POST[$key])
    				? $_POST[$key]
    				: ''
    			);
    	}
    
    	public function getQueryData($key = '') {
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

		public function getRequestURI($key = '')
		{
			$url = ($key == '')
    			? $_SERVER
    			: (isset($_SERVER[$key])
    				? $_SERVER[$key]
    				: ''
    			);
			
			$url =str_replace('/practise/mvc_catalog/', '', $url);
			return $url;

			
		}
}


