<?php

class Core_Model_Resource_Abstract{

    protected $_tableName = '';
    protected $_primaryKey = '';

    public function init($tableName, $primaryKey){
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }

    public function getTableName()
    {
        return $this->_tableName;
    }

    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

    public function getAdapter(){
        return new Core_Model_DB_Adapter();
    }

    public function load($id, $column = null){
        $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey} = $id LIMIT 1";
        return $this->getAdapter()->fetchRow($sql);
    }

// ------------------------------------------------------------
    public function temp_Load($id='', $column= null){
        $sql = "SELECT * FROM {$this->_tableName}";
        return $this->getAdapter()->fetch_allData($sql);
    }
// ------------------------------------------------------------

    public function save($product){

        $data = $product->getData();
        print_r($product->getId());
        if($product->getId() !== ""){
            $updateQu = $this->updateData($product->getId(), $data);
            return $this->getAdapter()->query($updateQu);
        }else{
            $insertData = $this->insertSql($this->getTableName(), $data);
            $id = $this->getAdapter()->insert($insertData);
            $product->setId($id);
        }
    }

    public function insertSql($tbname, $data)
    {
        $columns = $values = [];
        foreach ($data as $key => $val) {
            $columns[] = "`{$key}`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(" , ", $columns);
        $values = implode(" , ", $values);

        return "INSERT INTO {$tbname}({$columns}) VALUES ({$values})";
    }

    public function delete($abstract){
        $sql = "DELETE FROM {$this->getTableName()} WHERE {$this->getPrimaryKey()} = {$abstract->getId()}";
        return $this->getAdapter()->query($sql);
    }

    public function updateData($id,$data){

        $col_valData = [];
        foreach ($data as $col => $val) {
            if($col=="{$this->getPrimaryKey()}") continue;
            $col_valData[] = "`$col` = '".addslashes($val)."'";
         }
         
         $col_valData = implode(", ",$col_valData);

        $sql="UPDATE {$this->getTableName()} SET {$col_valData} WHERE {$this->getPrimaryKey()} = $id;";
        return $sql;
    }

}