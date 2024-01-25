<?php
include 'sql/connection.php';

$conn = $connection;

// Fetch categories from database
$query = "SELECT * FROM ccc_category";
$result = mysqli_query($conn, $query);

echo "<h1>Category List</h1>";
echo "<a href='category.php'>Add New Category</a>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['cat_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>
