<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "ccc_practice";
    
    $connection = mysqli_connect($servername,$username,$password,$dbName);

    if(mysqli_connect_errno())
    {
        echo "failed";
        exit();
    }
    else
    {
        echo "success";
    }
?>