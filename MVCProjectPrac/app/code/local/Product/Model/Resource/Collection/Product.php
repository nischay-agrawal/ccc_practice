<?php
class Product_Model_Resource_Collection_Product
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;

    }
    //above part is abstract
    public function __construct()
    {
        $this->init('ccc_product', 'product_id');
    }
}