<?php

class Core_Model_Resource_Abstract
{
    protected $_model = "";
    protected $_tableName = "";
    protected $_primaryKey = "";

    public function init($tablename, $primaryKey)
    {
        $this->_tableName = $tablename;
        $this->_primaryKey = $primaryKey;
    }
    public function load($id, $column = null)
    {
        if (isset ($id)) {
            $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey} = {$id} LIMIT 1";
            return $this->getAdapter()->fetchRow($sql);
        }
    }

    public function save(Core_Model_Abstract $model)
    {
        $data = $model->getData();
        if (isset ($data[$this->getPrimaryKey()]) && $model->getId() !== '') {
            $prevData = $this->load($model->getId());
            $data = $this->filterNewData($data, $prevData);
            if (!empty ($data)) {
                $sql = $this->updateSql($this->getTableName(), $data, [$this->getPrimaryKey() => $model->getId()]);
                $this->getAdapter()->update($sql);
            }
        } else {
            $sql = $this->insertSql($this->getTableName(), $data);
            $id = $this->getAdapter()->insert($sql);
            $model->setId($id);
        }
    }
    public function delete(Core_Model_Abstract $model)
    {
        $id = $model->getId();
        $sql = $this->deleteSql($this->getTableName(), [$this->getPrimaryKey() => $id]);
        return $this->getAdapter()->delete($sql);
    }
    public function getModel()
    {
        return $this->_model;
    }
    public function getAdapter()
    {
        return new Core_Model_Db_Adapter();
    }
    public function getTableName()
    {
        return $this->_tableName;
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }


    public function filterNewData($new, $old)
    {
        $new = array_filter($new, function ($value, $key) use ($old) {
            return ($old[$key] != $value);
        }, ARRAY_FILTER_USE_BOTH);
        return $new;
    }
    public function insertSql($table_name, $data)
    {
        $columns = [];
        $values = [];
        foreach ($data as $col => $val) {
            $columns[] = sprintf("`%s`", $col);
            $values[] = sprintf("'%s'", addslashes($val));
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        return "INSERT INTO $table_name($columns) VALUES($values);";
    }
    public function updateSql($table_name, $d, $where)
    {
        $data = [];
        $condition = [];
        foreach ($d as $col => $val) {
            $data[] = sprintf("`%s` = '%s'", $col, addslashes($val));
        }
        foreach ($where as $col => $val) {
            $condition[] = sprintf("`%s` = '%s'", $col, addslashes($val));
        }
        $data = implode(", ", $data);
        $condition = implode(" AND ", $condition);
        return "UPDATE $table_name SET $data WHERE $condition;";
    }

    public function deleteSql($table_name, $where = [])
    {
        $condition = [];
        foreach ($where as $col => $val) {
            $condition[] = sprintf("`%s` = '%s'", $col, addslashes($val));
        }
        $condition = implode(" AND ", $condition);
        return "DELETE FROM $table_name WHERE $condition;";
    }

    public function selectSql($table_name, $where = [])
    {
        $condition = [];
        foreach ($where as $col => $val) {
            $condition[] = sprintf("`%s` = '%s'", $col, addslashes($val));
        }
        if (!empty ($where))
            $condition = "WHERE" . implode(" AND ", $condition);
        else
            $condition = "";
        return "SELECT * FROM $table_name $condition;";
    }
}