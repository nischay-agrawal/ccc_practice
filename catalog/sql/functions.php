<?php

    function insert($table_name,$data){
        $columns = $values = [];
        foreach($data as $col => $val){
            $columns[] = "`$col`";
            $values[] = "'". addslashes($val). "'";
        }
        $columns = implode(", ",$columns);
        $values = implode(", ",$values);
        echo "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
    }

    function update($table_name, $data, $condition) {
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
    
    function delete($table_name, $conditionArray) {
        $conditionParts = [];
        foreach ($conditionArray as $col => $val) {
            $val = addslashes($val);
            $conditionParts[] = "`$col` = '$val'";
        }
        $conditionString = implode(" AND ", $conditionParts);
        echo "DELETE FROM {$table_name} WHERE {$conditionString}";
    }

    function select($table_name, $data, $condition) {
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
        echo "SELECT {$updateString} FROM {$table_name} WHERE {$conditionString}";
    }
    
?>