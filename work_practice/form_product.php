<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
</head>
<body>
    <form action="process_form.php" method="post">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" required><br><br>

        <label>Product Type:</label>
        <input type="radio" id="simpleType" name="productType" value="Simple" checked>
        <label for="simpleType">Simple</label>
        <input type="radio" id="bundleType" name="productType" value="Bundle">
        <label for="bundleType">Bundle</label><br><br>

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

        <label for="manufacturerCost">Manufacturer Cost:</label>
        <input type="text" id="manufacturerCost" name="manufacturerCost" required><br><br>

        <label for="shippingCost">Shipping Cost:</label>
        <input type="text" id="shippingCost" name="shippingCost" required><br><br>

        <label for="totalCost">Total Cost:</label>
        <input type="text" id="totalCost" name="totalCost" required><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option>
        </select><br><br>

        <label for="createdAt">Created At:</label>
        <input type="date" id="createdAt" name="createdAt" required><br><br>

        <label for="updatedAt">Updated At:</label>
        <input type="date" id="updatedAt" name="updatedAt" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>