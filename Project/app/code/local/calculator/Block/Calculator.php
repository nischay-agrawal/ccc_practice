<?php

class Calculator_Block_Calculator extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('calculator/form.phtml');
    }
    // public function getOperator()
    // {
    //     $bindding = [
    //         '+' => 'add',
    //         '-' => 'sub',
    //         '*' => 'mul',
    //         '/' => 'div',
    //         '%' => 'modulo',
    //     ];
    //     return isset($this->_data['operator']) ? $bindding[$this->_data['operator']] : '';
    // }
    public function getAllOperator(){
        $bindding = [
            '+' => 'add',
            '-' => 'sub',
            '*' => 'mul',
            '/' => 'div',
            '%' => 'modulo',
        ];
        // return array('+','-','*','/','%');
        return $bindding;
    }
}