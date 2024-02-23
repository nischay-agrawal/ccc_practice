<?php
    class Mage{
        private static $baseDir = "/Applications/XAMPP/xamppfiles/htdocs/Practise/MVCProjectPrac"; 
        private static $baseUrl = 'http://localhost/practise/MVCProjectPrac';


        public static function init()
        {
            $frontController = new Core_Controller_Front();
            $frontController->init();
            // $modelObj = Mage::getModel("core/request");
            // $var=$modelObj->getRequestUri();
            // // echo get_class($modelObj);
            // echo $var;
        }
        public static function getSingleton($className)
        {

        }
        public static function getModel($className)
        {
            // echo $className;
            // $classname=str_replace("/","_",$className);
            // $classname=ucwords("$classname","_");
            $className = ucwords(str_replace("/","_Model_",$className),"_");
            return new $className;
        }
        public static function getBlock($className)
        {
            $className = ucwords(str_replace("/","_Block_",$className),"_");
            return new $className;   
        }
        public static function register($key, $value)
        {
            
        }
        public static function registry($key)
        {

        }
        public static function getBaseDir($subDir = null)
        {
            if($subDir)
            {
                return self::$baseDir."/".$subDir;
            }
            return self::$baseDir;
        }
        public static function getBaseUrl($subDir = null){

            if($subDir)
            {
                return self::$baseUrl.'/'.$subDir;
            }
            return self::$baseUrl;
        }

    }
?>