<?php
    class Page_Controller_Index extends Core_Controller_Front_Action{
        public function indexAction()
        {
            // echo "Index Action";
            // echo dirname(__FILE__);
            $layout = $this->getLayout()->toHtml();
            print_r($layout);        
        }
    }
?>