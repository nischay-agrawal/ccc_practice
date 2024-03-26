<?php

class Import_Model_Resource_Import extends Core_Model_Resource_Abstract{
    public function __construct(){
        $this->init("data_center", "import_id");
    }
}