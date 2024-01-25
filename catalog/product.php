<?php
include 'sql/functions.php';
include 'sql/connection.php';

if(getPara('action') == 'delete' && getPara('product_id'))
{
    $result = delete('ccc_product',["product_id" => getPara('product_id')]);
    if ($result) {
        echo "<script>alert('Data not deleted')</script>";
        echo "<script>location. href='product_list.php'</script>";

    } else {
        echo "<script>alert('Data deleted')</script>";
        echo "<script>location. href='product_list.php'</script>";
    }
}

$categoryQuery = "SELECT * FROM ccc_category";
$categoryResult = mysqli_query($connection, $categoryQuery);

?>

<!DOCTYPE html>
<head>
    <title>Product Form</title>
</head>
<body>
    <form method="post">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" required><br><br>


        <label for="category">Category:</label>
        <select id="category" name="category" required>
        <?php while ($row = mysqli_fetch_assoc($categoryResult)) {
            echo "<option value='" . $row['cat_id'] . "'>" . $row['name'] . "</option>";
        } ?>
        </select><br><br>

        <button type="submit" name="Submit">Submit</button>
    </form>
</body>
</html>
