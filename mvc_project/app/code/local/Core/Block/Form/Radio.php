<?php

class Core_Block_Form_Radio extends Core_Block_Template
{
    protected function _toHtml()
    {
        // Get options from data or provide a default value
        $options = $this->getData('options') ?: [];

        // Start building the HTML for the radio input field
        $html = '';

        // Loop through options to generate radio buttons
        foreach ($options as $value => $label) {
            $html .= '<input type="radio" name="' . $this->getData('name') . '" value="' . $value . '" id="'.$label.'"';
            // If a default value is set, mark the corresponding radio button as checked
            if ($this->getData('value') == $value) {
                $html .= ' checked="checked"';
            }
            $html .= '>';
            $html .= '<label for="'.$label.'">' . $label . '</label><br>';
        }

        return $html;
    }
}