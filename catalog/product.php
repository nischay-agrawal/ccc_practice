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
            <option value="Bar & Game Room">Bar & Game Room</option>
            <option value="Bedroom">Bedroom</option>
            <option value="Decor">Decor</option>
            <option value="Dining & Kitchen">Dining & Kitchen</option>
            <option value="Lighting">Lighting</option>
            <option value="Living Room">Living Room</option>
            <option value="Mattresses">Mattresses</option>
            <option value="Office">Office</option>
            <option value="Outdoor">Outdoor</option>
        </select><br><br>

        <button type="submit" name="Submit">Submit</button>
    </form>
</body>
</html>