<?php

class Branchzip_Model_Branch extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClass = "Branchzip_Model_Resource_Branch";
        $this->_collectionClass = "Branchzip_Model_Resource_Collection_Branch";
        $this->_modelClass = "branchzip/branch";
    }
}