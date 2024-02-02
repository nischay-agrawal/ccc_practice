<?php
    class SQLBuilder
    {
        public function insert($table_name, $data)
        {
            $columns = $values = [];
            foreach ($data as $col => $val) {
                $columns[] = "`$col`";
                $values[] = "'" . addslashes($val) . "'";
            }
            $columns = implode(", ", $columns);
            $values = implode(", ", $values);
            return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
        }

        public function update($table_name, $data, $condition)
        {
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
            return "UPDATE {$table_name} SET {$updateString} WHERE {$conditionString}";
        }

        public function delete($table_name, $conditionArray)
        {
            $conditionParts = [];
            foreach ($conditionArray as $col => $val) {
                $val = addslashes($val);
                $conditionParts[] = "`$col` = '$val'";
            }
            $conditionString = implode(" AND ", $conditionParts);
            return "DELETE FROM {$table_name} WHERE {$conditionString}";
        }

        public function select($table_name, $columns = '*')
        {
            if (is_array($columns)) {
                $columns = implode(", ", array_map(function($col) {
                    return "`$col`";
                }, $columns));
            }

            return "SELECT {$columns} FROM `{$table_name}`";
        }
    }
?>
