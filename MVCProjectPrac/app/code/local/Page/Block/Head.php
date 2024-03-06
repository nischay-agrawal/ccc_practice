<?php
class Page_Block_Head extends Core_Block_Template
{
    protected $_css = [];
    protected $_js = [];
    public function __construct()
    {
        $this->setTemplate('page/head.phtml');
    }
    public function addJs($file)
    {
        $this->_js[] = $file;
        return $this;
    }
    public function addCss($file)
    {
        $this->_css[] = $file;
        return $this;
    }
    public function getJs()
    {
        return $this->_js;
    }
    public function getCss()
    {
        return $this->_css;
    }
    public function getCssUrl($_css)
    {
        return Mage::getBaseUrl('skin/css/' . $_css);
    }
    public function getJsUrl($_js)
    {
        return Mage::getBaseUrl('/skin/js/' . $_js);
    }

}