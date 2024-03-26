<?php

class Core_Block_Form_Text extends Core_Block_Template{
    protected function _toHtml()
    {
        $html = '<input type="text"';
        foreach ($this->getData() as $key => $value) {
            $html .= ' ' . $key . '="' . $value . '"';
        }
        $html .= ' />';
        return $html;
    }
}