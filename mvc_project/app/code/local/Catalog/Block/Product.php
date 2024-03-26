<?php

class Catalog_Block_Product extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/product/view.phtml');
    }
}