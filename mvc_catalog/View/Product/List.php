<pre>
<?php
class View_Product_List
{
    public function __construct()
    {
    }

    public function createTable($data)
    {
        $table = "<table>";
        $table .= $this->createTableHead();
        $table .= $this->createTableBody($data);
        return $table;
    }

    public function createTableBody($data)
    {
        $table_body = '<tbody>';
        foreach ($data as $value) {
            $table_body .= "<tr>";
            $table_body .= "<td>{$value['product_id']}</td>";
            $table_body .= "<td>{$value['product_name']}</td>";
            $table_body .= "<td>{$value['category']}</td>";
            $table_body .= "<td><a href='../Product.php?action=edit&pid={$value['product_id']}'>Edit</a></td>";
            $table_body .= "<td><a href='../Product.php?action=delete&pid={$value['product_id']}'>Delete</a></td>";
            $table_body .= "<tr>";
        }
        $table_body .= "</tbody>";
        return $table_body;
    }
    public function createTableHead()
    {
        $table_head = '<thead><tr>';
        $head_data = ["Id", "Name", "Category", "Edit", "Delete"];
        foreach ($head_data as $value) {
            $table_head .= "<th>{$value}</th>";
        }
        $table_head .= "</tr></thead>";
        return $table_head;
    }

    public function toHTML()
    {
        // echo "1234567";
        // return $this->createTable($data);
    }

}
?>
