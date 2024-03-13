<?php

class Calculator_Model_Calculator extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Calculator_Model_Resource_Calculator';
        $this->_collectionClass = 'Calculator_Model_Resource_Collection_Calculator';
    }
    protected function _beforeSave()
    {
        $num1 = $this->getFrom();
        $num2 = $this->getTo();
        $operator = $this->getOperator();
        $result = 0;
        switch ($operator) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'sub':
                $result = $num1 - $num2;
                break;
            case 'mul':
                $result = $num1 * $num2;
                break;
            case 'div':
                $result = $num1 / $num2;
                break;
            case 'modulo':
                $result = $num1 % $num2;
                break;
        }
        $this->addData('result', $result);
    }
    public function _afterSave()
    {
    }
}
