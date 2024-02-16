<?php
class Core_Absttract
{
    public function __construct() {
        echo get_class($this);
    }
}
class Product_Main extends Core_Absttract
{
    
}
class Product_Model extends Product_Main
{
    
}
