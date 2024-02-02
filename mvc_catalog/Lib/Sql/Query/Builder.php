<?php
    class Lib_Sql_Query_Builder extends Lib_Connection
    {
        public function __construct()
        {
            // echo get_class($this);
        }

        public function insert($tableName, $data)
        {
            $columns = $values = [];
            foreach ($data as $key => $value) {
                $columns[] = sprintf("`%s`", $key);
                $values[]  = sprintf("'%s'", addslashes($value));
            }
            $columns = implode(",", $columns);
            $values = implode(",", $values);
            return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values});";
        } 
        public function update($table_name, $data, $condition) {
            $updateParts = [];
            foreach ($data as $col => $val) {
                $val = addslashes($val);
                $updateParts[] = "`$col` = '$val'";
            }
            $updateString = implode(", ", $updateParts);
            $conditionParts = [];
            foreach ($condition as $col => $val) {
                $val = addslashes($val);
                $conditionParts[] = "`$col` = '$val'";
            }
            $conditionString = implode(" AND ", $conditionParts);
            echo "UPDATE {$table_name} SET {$updateString} WHERE {$conditionString}";
        }
        public function delete($table_name, $condition) {
            $conditionParts = [];
            foreach ($condition as $col => $val) {
                $val = addslashes($val);
                $conditionParts[] = "`$col` = '$val'";
            }
            $conditionString = implode(" AND ", $conditionParts);
            echo "DELETE FROM {$table_name} WHERE {$conditionString}";
        }
    }
?>