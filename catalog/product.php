<?php
include 'sql/functions.php';
include 'sql/connection.php';

$product_name = "";
$product_sku = "";
$product_category = "";
$button_text = 'submit';

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

function whereBasedSelect(string $table_name, array $where)
{
    global $connection;
    $where_cond = [];
    foreach ($where as $col => $val) {
        $where_cond[] = "$col = $val";
    };
    $where_cond = implode(" AND ", $where_cond);
    $query = "SELECT * FROM `{$table_name}` WHERE {$where_cond}";
    return $connection->query($query);
}
function getKeysFromPostRequest()
{
    $keys = [];
    foreach ($_POST as $key => $val) {
        if (is_array($val)) {
            $keys[] = $key;
        };
    };
    return $keys;
}

if (getPara('action') == 'update' && getPara('product_id')) {
    $single_product = whereBasedSelect('ccc_product', ['product_id' => getPara('product_id')]);
    if ($single_product) {
        $single_product = $single_product->fetch_assoc();
        $product_name = $single_product['product_name'];
        $product_sku = $single_product['sku'];
        $product_category = $single_product['cat_id'];
        $button_text = 'update';
        echo $product_type;
    } else {
        echo "<script>alert('Data not found')</script>";
    };
}


// Inserting data
if (getPara('submit')) {
    $keys = getKeysFromPostRequest();
    for ($i = 0; $i < count($keys); $i++) {
        $insert_query = insert($keys[$i], getPara($keys[$i]));
        if ($insert_query) {
            echo "<script>alert('Data submitted successfully')</script>";
            echo "<script>location. href='product_list.php'</script>";
        } else {
            echo "<script>alert('Data not submitted')</script>";
            echo "<script>location. href='product_list.php'</script>";
        }
    };
};

//Updating Data
if (getPara('update')) {
    $keys = getKeysFromPostRequest();
    for ($i = 0; $i < count($keys); $i++) {
        $insert_query = update("ccc_product", getPara($keys[$i]), ['product_id' => getPara('product_id')]);
        if ($insert_query) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>location. href='product_list.php'</script>";
        } else {
            echo "<script>alert('Data not updated')</script>";
            echo "<script>location. href='product_list.php'</script>";
        }
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
        <input type="text" value="<?php echo $product_name ?>" id="productName" name="productName" required><br><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" value="<?php echo $product_sku ?>" required><br><br>


        <label for="category">Category:</label>
        <select id="category" name="category" required >
        <?php while ($row = mysqli_fetch_assoc($categoryResult)) {
            echo "<option value='" . $row['cat_id'] . "'>" . $row['name'] . "</option>";
        } ?>
        </select><br><br>

        <?php
        echo "<input type='submit' name='$button_text' value='Submit' id='submit'>";
        ?>
    </form>
</body>
</html>
