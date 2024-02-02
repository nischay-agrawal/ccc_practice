<?php
    class View_Product_List{
        public function __construct()
        {
            
        }
        public function listProducts(){
            $list = new Model_Product();
            $list->list("*");
        }

    }

?>