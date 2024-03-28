<?php

class Branchzip_Model_Zipcode extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClass = "Branchzip_Model_Resource_Zipcode";
        $this->_collectionClass = "Branchzip_Model_Resource_Collection_Zipcode";
        $this->_modelClass = "branchzip/zipcode";
    }
}