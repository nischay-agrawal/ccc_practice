<?php

class Page_Block_Header extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('Page/header.phtml');
    }
}