<?php

class Mage{

    // private static $registry = [] ;
    private static $baseDir = "/Applications/XAMPP/xamppfiles/htdocs/Practise/mvc_project"; 
    private static $baseUrl = 'http://localhost/practise/mvc_project';

    public static function init(){
    
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }

    public static function getSingleton($className){

    }

    public static function getModel($className){

        $className = str_replace("/", "_Model_", $className);
        $className = ucwords(str_replace("/", "_", $className), '_');
        return new $className();
    }

    public static function getBlock($className){
        $className = str_replace("/", "_Block_", $className);
        $className = ucwords(str_replace("/", "_", $className), '_');
        return new $className();
    }

    public static function register($key, $value){

        // self::$registry[$key]= $value;
    }

    public static function registry($key){

        // return isset(self::$registry[$key]) ? self::$registry[key] : null;

    }

    public static function getBaseDir($subDir = null){

        if($subDir)
        {
            return self::$baseDir.'/'.$subDir;
        }
        return self::$baseDir;
    }
    
    public static function getBaseUrl($subUrl = null){

        if($subUrl)
        {
            return self::$baseUrl.'/'.$subUrl;
        }
        return self::$baseUrl;
    }
}