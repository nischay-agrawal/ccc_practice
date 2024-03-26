<?php

class Core_Block_Template extends Core_Block_Abstract
{
    protected $_child = [];
    public function toHtml()
    {
        $this->render();
    }

    public function addChild($key, $value)
    {
        $this->_child[$key] = $value;
        return $this;
    }

    public function removeChild($key)
    {
        unset($this->_child[$key]);
    }

    public function getChild($key)
    {
        if (array_key_exists($key, $this->_child))
            return $this->_child[$key];
        return false;
    }

    public function getRenderer($type, $attributes = [])
    {
        return Mage::getBlock("core/form_" . $type)
            ->setData($attributes)
            ->_toHtml();
    }
    public function getChildHtml($key)
    {
        $html = '';
        if ($key == '' && count($this->_child)) {
            foreach ($this->_child as $child) {
                $html .= $child->toHtml();
            }
        } else {
            $html = $this->getChild($key)->toHtml();
        }
        return $html;
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
}