<?php

class Core_Model_Abstract
{
    protected $_data = [];
    protected $_resourceClass = '';
    protected $_collectionClass = '';
    protected $_modelClass = '';
    protected $_resource = null;
    protected $_collection = null;
    public function __construct()
    {
        $this->init();
    }
    public function init()
    {

    }
    public function setResourceClass($resourceClass)
    {
        $this->_resourceClass = $resourceClass;
    }
    public function setCollectionClass($collectionClass)
    {
        $this->_collectionClass = $collectionClass;
    }
    public function setId($id)
    {
        $this->_data[$this->getResource()->getPrimaryKey()] = $id;
        return $this;
    }
    public function getId()
    {
        return (isset ($this->_data[$this->getResource()->getPrimaryKey()]))
            ? $this->_data[$this->getResource()->getPrimaryKey()]
            : 0;
    }
    public function getResource()
    {
        return new $this->_resourceClass();
    }
    public function getCollection()
    {
        $collection = new $this->_collectionClass();
        $collection->setResource($this->getResource());
        $collection->setModelClass($this->_modelClass);
        $collection->select();
        return $collection;
    }
    public function getPrimaryKey()
    {

    }
    public function getTableName()
    {

    }
    public function camelCase2UnderScore($str, $separator = "_")
    {
        if (empty ($str))
            return $str;
        $str = lcfirst($str);
        $str = preg_replace("/[A-Z]/", $separator . "$0", $str);
        return strtolower($str);
    }
    public function __call($name, $param)
    {
        $name = $this->camelCase2UnderScore(substr($name, 3));
        return isset ($this->_data[$name]) ? $this->_data[$name] : '';
    }
    public function __set($key, $value)
    {

    }
    public function __get($key)
    {

    }
    public function __unset($key)
    {

    }
    public function getData($key = null)
    {
        if (!is_null($key)) {
            if (array_key_exists($key, $this->_data)) 
                return $this->_data[$key];
        } else {
            return $this->_data;
        }
    }
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }
    public function addData($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }
    public function removeData($key = null)
    {
        unset($this->_data[$key]);
        return $this;
    }
    protected function _beforeSave()
    {

    }
    protected function _afterSave()
    {

    }
    public function save()
    {
        $this->_beforeSave();
        $this->getResource()->save($this);
        $this->_afterSave();
        return $this;
    }
    public function load($id, $column = null)
    {
        $this->_data = $this->getResource()->load($id, $column);
        return $this;
    }
    public function delete()
    {
        if ($this->getId()) {
            $this->getResource()->delete($this);
        }
        return $this;
    }

}