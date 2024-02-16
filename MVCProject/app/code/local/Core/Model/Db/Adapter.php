<?php

class Core_Model_Db_Adapter
{
    public $config = [
        "dbname" => "ccc_practice",
        "hostname" => "localhost",
        "user" => "root",
        "password" => "",
    ];
    public $connect = null;
    public function connect()
    {
        if(is_null($this->connect)){
            $this->connect = mysqli_connect(
                $this->config['hostname'],
                $this->config['user'],
                $this->config['password'],
                $this->config['dbname'],
            );
        }
        // if (!$this->connect) {
        //     die("Connection error: " . mysqli_connect_error());
        // }
    }
    public function fetchAll($query)
    {
    }
    public function fetchPairs($query)
    {
    }
    public function fetchOne($query)
    {
    }
    public function fetchRow($query)
    {
    }
    public function insert($query)
    {
    }
    public function update($query)
    {
    }
    public function delete($query)
    {
    }
    public function query($query)
    {
    }
}
