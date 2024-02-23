<?php
class Catalog_Model_Resource_Product extends Core_Model_Resource_Abstract
{
    // protected $_tableName = "";
    // protected $_primaryKey = "";
    // public function init($tableName, $primaryKey)
    // {
    //     // echo $tableName;
    //     // echo $primaryKey;
    //     $this->_tableName = $tableName;
    //     $this->_primaryKey = $primaryKey;

    // }
    // public function load($id,$column=null)
    // {
    //     $sql="SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey} = {$id} LIMIT 1";
    //     // echo $sql;
    //     return $this->getAdapter()->fetchRow($sql);
    //     // print_r($result);
    // }
    // public function getAdapter()
    // {
    //     return new Core_Model_DB_Adapter();
    // }
    // public function getTableName()
    // {
    //     return $this->_tableName;
    // }
    // public function getPrimaryKey()
    // {
    //     return $this->_primaryKey;
    // }
    //Above part is abstract
    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
    // public function save(Catalog_Model_Product $product)
    // {
    //     $data = $product->getData();
    //     // print_r($data);
    //     // die;
    //     if(isset($data[$this->getPrimaryKey()]))
    //     {
    //         unset( $data[$this->getPrimaryKey()] );
    //     }

    //     // echo 123;
    //     $sql = $this->insertSql($this->getTableName(), $data);
    //     $id = $this->getAdapter()->insert($sql);
    //     $product->setId($id);
    //     var_dump($id);
    //     // print_r($data);
    // }
    // public function insertSql($tbname, $data)
    // {
    //     $columns = $values = [];
    //     foreach ($data as $key => $val) {
    //         $columns[] = "`{$key}`";
    //         $values[] = "'" . addslashes($val) . "'";
    //     }
    //     $columns = implode(" , ", $columns);
    //     $values = implode(" , ", $values);

    //     // echo "INSERT INTO {$tbname}({$columns}) VALUES ({$values})";
    //     return "INSERT INTO {$tbname}({$columns}) VALUES ({$values})";
    // }
}