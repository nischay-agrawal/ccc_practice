<?php

class Core_Block_Form_Select extends Core_Block_Template
{
    protected function _toHtml()
    {
        // Implement logic to render multi-value input field (e.g., select, checkbox, radio buttons, etc.)
        // Example:
        $html = '<select name="'.$this->getData('name').'" id="'.$this->getData('id').'">';
        foreach ($this->getData('options') as $value => $label) {
            $selected = ($value == $this->getData('selected')) ? 'selected' : '';
            $html .= '<option value="' . $value . '" '.$selected.'>' . $label . '</option>';
        }
        $html .= '</select>';
        return $html;
    }
}