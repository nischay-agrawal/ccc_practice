<?php

class Mage
{
    private static $baseDir = '/Applications/XAMPP/xamppfiles/htdocs/Practise/mvc_project/';
    private static $baseUrl = "/practise/mvc_project/";
    private static $registry = [];
    private static $_singleton = [];
    public function __construct()
    {

    }

    public static function init()
    {
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }

    public static function getSingleton($className)
    {
        if (isset(self::$_singleton[$className])) {
            return self::$_singleton[$className];
        } else {
            return self::$_singleton[$className] = self::getModel($className);
        }
    }

    public static function getModel($className)
    {
        $className = str_replace("/", "_Model_", $className);
        $className = ucwords(str_replace("/", "_", $className), '_');
        return new $className();
    }
    public static function getBlock($className)
    {
        $className = str_replace("/", "_Block_", $className);
        $className = ucwords(str_replace("/", "_", $className), '_');
        return new $className();
    }

    public static function register($key, $value)
    {
        self::$registry[$key] = $value;
    }

    public static function registry($key)
    {
        return isset(self::$registry[$key]) ? self::$registry[$key] : null;
    }

    public static function getBaseDir($subDir = null)
    {
        if (!is_null($subDir))
            return self::$baseDir . $subDir;
        return self::$baseDir;
    }
    public static function getBaseUrl($subUrl = null)
    {
        if (!is_null($subUrl))
            return self::$baseUrl . $subUrl;
        return self::$baseUrl;
    }
    public static function uploadFile($image, $path = '')
    {
        $fileName = $image['name'];
        $tmp_name = $image["tmp_name"];
        
        $targetFile = Mage::getBaseDir('media/'.$path) . $fileName;
        move_uploaded_file($tmp_name, $targetFile);
        return $fileName;
    }
}