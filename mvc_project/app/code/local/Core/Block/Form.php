<?php

class Core_Block_Form extends Core_Block_Template
{
    public function appendCommonAttr()
    {
        $html = '';
        $html .= ' name="'.$this->getData('name').'"';
        $html .= ' id="'.$this->getData('id').'"';
        $html .= ' class="'.$this->getData('class').'"';
    }
}