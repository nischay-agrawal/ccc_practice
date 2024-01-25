<?php
include 'sql/connection.php';

function addCategory($name) {
    global $connection;
    $stmt = $connection->prepare("INSERT INTO ccc_category (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->close();
    $connection->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    addCategory($name);
    header("Location: category_list.php");
    exit();
}
?>

<form method="post" action="">
    <label for="name">Category Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <input type="submit" value="Submit">
</form>
