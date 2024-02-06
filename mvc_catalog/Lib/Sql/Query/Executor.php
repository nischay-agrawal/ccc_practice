<?php
    class Lib_Sql_Query_Executor extends Lib_Connection{
        
        function execute($sql)
        {
            $result = $this->_conn->query($sql);
            return $result;
        }
        function fetchAssoc($result)
        {
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            } else {
                echo "No record found!";
            }
            return $data;
        }

    }
?>