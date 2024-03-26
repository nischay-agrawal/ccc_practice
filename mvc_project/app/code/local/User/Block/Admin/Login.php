<?php

class User_Block_Admin_Login extends Core_Block_Template
{
    public function __construct(){
        $this->setTemplate('user/admin/login.phtml');
    }
}