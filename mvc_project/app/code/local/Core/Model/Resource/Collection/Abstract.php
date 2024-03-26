<?php

class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null;
    protected $_model = null;
    protected $_select = [];
    protected $_data = [];
    public function setResource($resource)
    {
        $this->_resource = $resource;
        return $this;
    }

    public function select()
    {
        $this->_select['FROM'] = $this->_resource->getTableName();
        return $this;
    }
    public function addSelect($columns, $count = false)
    {
        if ($count)
            $columns[] = 'COUNT(*) AS count';
        $this->_select['SELECT'] = $columns;
        return $this;
    }
    public function addFieldToFilter($field, $value)
    {
        $this->_select['WHERE'][$field][] = $value;
        return $this;
    }

    public function addOrderBy($field, $type = 'ASC')
    {
        $this->_select['ORDER BY'][$field] = $type;
        return $this;
    }
    public function addLimit($limit, $offset = 0)
    {
        $this->_select['LIMIT'] = [$limit, $offset];
        return $this;
    }
    public function addGroupBy($field)
    {
        $this->_select['GROUP BY'][] = $field;
        return $this;
    }
    public function addJoin($type, $table, $condition)
    {
        $this->_select['JOIN'][] = [
            'type' => $type,
            'table' => $table,
            'condition' => $condition
        ];
        return $this;
    }


    public function load()
    {
        $selectClause = isset ($this->_select['SELECT']) ? implode(', ', $this->_select['SELECT']) : '*';
        $sql = sprintf("SELECT %s FROM %s", $selectClause, $this->_select['FROM']);
        if (isset ($this->_select['JOIN'])) {
            foreach ($this->_select['JOIN'] as $join) {
                $sql .= " {$join['type']} JOIN {$join['table']} ON {$join['condition']}";
            }
        }
        if (isset ($this->_select['WHERE'])) {
            $whereCondition = [];
            foreach ($this->_select["WHERE"] as $column => $value) {
                foreach ($value as $_value) {
                    if (!is_array($_value)) {
                        $_value = array('eq' => $_value);
                    }
                    foreach ($_value as $_condition => $_v) {
                        if (is_array($_v)) {
                            $_v = array_map(function ($v) {
                                return "'{$v}'";
                            }, $_v);
                            $_v = implode(',', $_v);
                        }
                        switch ($_condition) {
                            case 'eq':
                                $whereCondition[] = "{$column} = '{$_v}'";
                                break;
                            case 'in':
                                $whereCondition[] = "{$column} IN ({$_v})";
                                break;
                            case 'like':
                                $whereCondition[] = "{$column} LIKE '{$_v}'";
                                break;
                            case 'is':
                                $whereCondition[] = "{$column} IS {$_v}";
                                break;
                            case 'bwn':
                                $from = explode(',', $_v)[0];
                                $to = explode(',', $_v)[1];
                                $whereCondition[] = "{$column} BETWEEN $from AND $to";
                        }
                    }
                }
            }
            $sql .= " WHERE " . implode(" AND ", $whereCondition);
        }
        if (isset ($this->_select['ORDER BY'])) {
            $orderByCondition = [];
            foreach ($this->_select['ORDER BY'] as $column => $type) {
                $orderByCondition[] = "$column $type";
            }
            $sql .= " ORDER BY " . implode(", ", $orderByCondition);
        }
        if (isset ($this->_select['GROUP BY'])) {
            $groupByCondition = implode(", ", $this->_select['GROUP BY']);
            $sql .= " GROUP BY $groupByCondition";
        }
        if (isset ($this->_select['LIMIT'])) {
            $limitCondition = $this->_select['LIMIT'];
            $sql .= " LIMIT " . $limitCondition[0] . " OFFSET " . $limitCondition[1];
        }
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $this->_data[] = Mage::getModel($this->_model)->setData($row);
        }
    }
    public function setModelClass($modelClass)
    {
        $this->_model = $modelClass;
    }
    public function getData()
    {
        $this->load();
        return $this->_data;
    }

    public function getFirstItem()
    {
        $this->load();
        return (isset ($this->_data[0])) ? $this->_data[0] : null;
    }
}