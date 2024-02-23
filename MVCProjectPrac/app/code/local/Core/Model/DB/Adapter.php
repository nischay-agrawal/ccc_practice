<?php

class Core_Model_DB_Adapter
{
    public $config = [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'db' => 'ccc_project',
    ];
    public $connect = null;
    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = mysqli_connect(
                $this->config['host'],
                $this->config['user'],
                $this->config['password'],
                $this->config['db']
            );
        }
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
        $row = [];
        $this->connect();
        $result = mysqli_query($this->connect, $query);
        while ($_row = mysqli_fetch_assoc($result)) {
            $row = $_row;
        }
        return $row;
    }
    public function insert($query)
    {
        $this->connect();
        // print_r($query);
        // die;
        $sql = mysqli_query($this->connect, $query);
        if ($sql) {
            echo "Data insert Successfully";
            return mysqli_insert_id($this->connect);
        } else {
            return FALSE;
        }
    }

    public function update($query)
    {

    }
    public function delete($query)
    {
        $result = mysqli_query($this->connect(), $query);
        if($result){
            echo '<script>alert("Data deleted successfully")</script>';
        }else{
            echo '<script>alert("Data not deleted")</script>';
        }
    }
    public function query($query)
    {

    }
}

