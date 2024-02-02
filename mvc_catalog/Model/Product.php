<?php
class Model_Product extends Model_Abstract
{
    public $tableName = "ccc_product";

    public function __construct()
    {

    }

    public function save($data)
    {
        echo "<pre>";
        $sql = $this->getQueryBuilder()
            ->insert(
                $this->tableName,
                $data
            );
         $this->getQueryBuilder()->exec($sql);
    }

    public function list($columns)
    {
        echo "<pre>";
        $sql = $this->getQueryBuilder()
            ->select(
                $this->tableName,
                $columns
            );
         $this->getQueryBuilder()->exec($sql);
    }
}
?>