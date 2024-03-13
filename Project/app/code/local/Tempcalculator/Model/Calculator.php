<?php

class Tempcalculator_Model_Calculator extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClass = 'Tempcalculator_Model_Resource_Calculator';
        $this->_collectionClass = 'Tempcalculator_Model_Resource_Collection_Calculator';
    }
    protected function _beforeSave(){
        $unit = $this->getUnit();
        $convertUnit = $this->getConvertUnit();
        $temp = $this->getTemprature();
        $result = null;

        switch($unit){
            case 'F':
                if($convertUnit == 'K'){
                    $result =  5/9 * ($temp - 32) + 273.15;
                }elseif($convertUnit == 'C'){
                    $result = (5/9) * (($temp) - 32);
                }else{
                    $result = $temp;
                }
                break;
            case 'C':
                if($convertUnit == 'K'){
                    $result = $temp + 273.15;
                }elseif($convertUnit == 'F'){
                    $result =  (9/5 * $temp) + 32;
                }else{
                    $result = $temp;
                }
                break;
            case 'K':
                if($convertUnit == 'C'){
                    $result = $temp - 273.15;
                }elseif($convertUnit == 'F'){
                    $result = ($temp - 273.15) * 9/5 + 32;
                }else{
                    $result = $temp;
                }
                break;
        }
        $this->addData('result', $result);
    }
    public function _afterSave(){

    }
}