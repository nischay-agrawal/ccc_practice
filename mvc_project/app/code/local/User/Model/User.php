<?php

class User_Model_User extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = "User_Model_Resource_User";
        $this->_collectionClass = "User_Model_Resource_Collection_User";
        $this->_modelClass = "user/user";
    }
}