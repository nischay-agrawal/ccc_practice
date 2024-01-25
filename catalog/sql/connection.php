<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "ccc_practice";

    function connect($servername,$username,$password,$dbName)
    {    
        $connection = mysqli_connect($servername,$username,$password,$dbName);
        return $connection;
    }

?>