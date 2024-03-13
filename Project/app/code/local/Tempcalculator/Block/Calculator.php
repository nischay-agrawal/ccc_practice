<?php

class Tempcalculator_Block_Calculator extends Core_Block_Layout{
    public function __construct(){
        $this->setTemplate('tempcalculator/form.phtml');
    }
    public function getTempratureUnits(){
        return ['C', 'F', 'K'];
    }
}