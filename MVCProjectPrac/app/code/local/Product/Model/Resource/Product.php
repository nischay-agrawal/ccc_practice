<?php
class Product_Model_Resource_Product
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tableName, $primaryKey)
    {
        // echo $tableName;
        // echo $primaryKey;
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;

    }
    public function load($id,$column=null)
    {
        $sql="SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey} = {$id} LIMIT 1";
        // echo $sql;
        return $this->getAdapter()->fetchRow($sql);
        // print_r($result);
    }
    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    //Above part is abstract
    public function __construct()
    {
        $this->init('ccc_product', 'product_id');
    }








    // public function getAdapter()
    // {
    //     return new Core_Model_DB_Adapter;
    // }
    // public function getData($id='')
    // {
    //     $sql='SELECT * FROM ' .$this->_tableName.' WHERE '.$this->_primaryKey.'='.$id;
    //     $data=$this->getAdapter()->fetchRow($sql);
    //     return $data;
    // }

}