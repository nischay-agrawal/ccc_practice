<?php

class Catalog_Block_Category extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/category/view.phtml');
    }
}