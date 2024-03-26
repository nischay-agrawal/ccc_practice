<?php

class Core_Model_Db_Adapter
{
    public $config = ['host' => 'localhost', 'user' => 'root', 'password' => '', 'db' => 'ccc_project'];
    public $connect = null;
    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = new mysqli(
                $this->config['host'],
                $this->config['user'],
                $this->config['password'],
                $this->config['db']
            );
        }
        return $this;
    }
    public function fetchAll($query)
    {
        $this->connect();
        $row = [];
        $result = $this->connect->query($query);
        while($_row = $result->fetch_assoc()){
            $row[] = $_row;
        }
        return $row;
    }
    public function fetchPairs($query)
    {

    }
    public function fetchOne($query)
    {

    }
    public function fetchRow($query)
    {
        $row = [];
        $this->connect();
        $result = $this->connect->query($query);
        $_row = $result->fetch_assoc();
        return $_row;
    }
    public function insert($query)
    {
        $this->connect();
        $result = $this->connect->query($query);
        if($result)
            return $this->connect->insert_id;
        else
            return false;
    }
    public function update($query)
    {
        $this->connect();
        $result = $this->connect->query($query);
        if($result)
            return $this->connect->affected_rows;
        else
            return false;   
    }
    public function delete($query)
    {
        $this->connect();
        $result = $this->connect->query($query);
        if($result)
            return $this->connect->affected_rows;
        else
            return false;  
    }
    public function query($query)
    {

    }

}