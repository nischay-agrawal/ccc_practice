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
    
    if(isset($_POST["Submit"]))
    {
        $productName = $_POST['productName'];
        $sku = $_POST['sku'];
        $productType = $_POST['productType'];
        $category = $_POST['category'];
        $manufacturerCost = $_POST['manufacturerCost'];
        $shippingCost = $_POST['shippingCost'];
        $totalCost = $_POST['totalCost'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $createdAt = $_POST['createdAt'];
        $updatedAt = $_POST['updatedAt'];

        $query= "INSERT INTO ccc_product Values('$productName','$sku','$productType','$category','$manufacturerCost','$shippingCost','$totalCost','$price','$status','$createdAt','$updatedAt')";
        mysqli_query($connection,$query);

    }
    mysqli_close($conn);
?>