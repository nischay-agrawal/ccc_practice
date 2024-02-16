<?php

class Core_Block_Template extends Core_Block_Abstract
{
    protected $_child = array();
    // public $template;
    public function toHtml()
    {
        $this->render();
    }
    public function addChild($key, $value)
    {
        $this->_child[$key] = $value;
    }
    public function removeChild($key)
    {
    }
    public function getChild($key)
    {
        return $this->_child[$key];
    }
    public function getChildHtml($key){
        return $this->_child[$key]->toHtml();
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
    // public function setTemplate($template){
    //     $this->template = $template;
    // }
    // public function getTemplate(){
    //     return $this->template;
    // }
}
