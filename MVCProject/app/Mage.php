<?php

class Mage
{
    private static $baseDir = '/Applications/XAMPP/xamppfiles/htdocs/Practise/MVCProject'; 
    public static function  init()
    {
        // $request_model = new App_Code_Local_Core_Controller_Model_Request();
        // $request = Mage::getModel('core/request');
        // echo  $request_uri = $request_model->getrequestUri();

        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getModel($modelName)
    {
        $modelName = ucwords(str_replace('/', '_Model_', $modelName), "_");
        return new $modelName();
    }
    public static function getBlock($blockName)
    {
        $blockName = ucwords(str_replace('/', '_Block_', $blockName), "_");
        return new $blockName();
    }
    public static function getSingleton($className)
    {
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . '/' . $subDir;
        }
        return self::$baseDir;
    }
}
