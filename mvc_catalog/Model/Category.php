<?php
class Model_Category extends Model_Abstract
{
    public $tableName = "ccc_category";

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
}
?>