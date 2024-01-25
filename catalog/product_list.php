<?php
include 'sql/connection.php';
include 'sql/functions.php';

$query = "SELECT * FROM ccc_product ORDER BY product_id DESC LIMIT 20";
$result = $connection->query($query);

echo "<table>";
echo "<tr><th>Product Name</th><th>SKU</th><th>Category</th><th>Edit</th><th>Delete</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['product_id']."</td>";
    echo "<td>".$row['product_name']."</td>";
    echo "<td>".$row['sku']."</td>";
    echo "<td>".$row['category']."</td>";
    echo "<td><a href='product.php?action=update&product_id={$row['product_id']}'>Update</a></td>";
    echo "<td><a href='product.php?action=delete&product_id={$row['product_id']}'>Delete</a></td>";
    
    echo "</tr>";
}

echo "</table>";

$connection->close();
?>
