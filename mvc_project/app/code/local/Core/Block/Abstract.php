<?php

class Core_Block_Abstract
{
    public $template;
    public $data = [];
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function __get($key)
    {

    }

    public function __unset($key)
    {

    }

    public function __set($key, $value)
    {

    }

    public function addData($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function getData($key = null)
    {
        if(!is_null( $key )) {
            return isset( $this->data[$key] ) ? $this->data[$key] : '';
        }
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    // public function getUrl($action = null, $controller = null, $params = [], $resetParams = false)
    public function getUrl($path)
    {
        return "http://localhost/practise/mvc_project/".$path;
    }
    public function getRequest()
    {

    }
    public function render()
    {
        include Mage::getBaseDir('app')."/design/frontend/template/".$this->getTemplate();
    }


}