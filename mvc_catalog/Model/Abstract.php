<?php
class Model_Abstract
{
    public function getQueryBuilder()
    {
        return new Lib_Sql_Query_Builder();
    }

}
