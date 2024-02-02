<pre>
<?php
    class Data_Collection_Object {
        protected $_data = [];
        public function addData($row){
                $this->_data[] = new Data_Object($row);
        }

        public function getData() {
            return $this->_data;
        }
    }
    class Data_Object {
        protected $_row = [];
        public function __construct($row){
            $this->_row = $row;
        }
        public function __call($name, $args) {
            $name = strtolower(substr($name, 3));
            return isset($this->_row[$name])
                ? $this->_row[$name]
                : $args[0];

            print_r($name);

            echo "<br/>";
            // print_r($args);
        }
    }
    $newObj = new Data_Collection_Object();
    $temp = [
        ['id' => 2, 'name' => 'nanme 2','sku'=>12],
        ['id' => 3, 'name' => 'nanme 0'],
        // ['id' => 4, 'name' => 'nanme 8'],
        // ['id' => 5, 'name' => 'nanme 0'],
        // ['id' => 6, 'name' => 'nanme 88'],
    ];
    foreach($temp as $_temp) {
        $newObj->addData($_temp);
    }
    foreach($newObj->getData() as $_mmdata) {
        print_r($_mmdata);
        echo "<br>";
        print_r($_mmdata->getSku('Simple'));
        echo "<br>";
        print_r($_mmdata->getName());
    }
    
?>