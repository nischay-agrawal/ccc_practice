<?php

class Import_Model_Import extends Core_Model_Abstract{
    public function __construct(){
        $this->setResourceClass("Import_Model_Resource_Import");
        $this->setCollectionClass("Import_Model_Resource_Collection_Import");
        $this->_modelClass = "import/import";
    }
}