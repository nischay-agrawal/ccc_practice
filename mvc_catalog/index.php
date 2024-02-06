<?php
    include "Lib/autoload.php";
    // $request = new Model_Request();
    // if(!$request->isPost()) {
    //     $product = new View_Product();
    //     echo $product->toHtml();
    // } else {
    //     $product = new Model_Product();
    //     $product->save($request->getParams('pdata'));
    //     // print_r();
    // }
    // $product_list_view = new View_Product_List();
    // echo $product_list_view->toHTML($productModel->fetch('*'));
    class Ccc{
        public static function init()
        {
            $frontController = new Controller_Front();
            $frontController->init();
        }
    }

    Ccc::init();
?>