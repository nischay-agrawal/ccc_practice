<?php

class Catalog_Controller_Product extends Core_Controller_Front_Action
{


    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('catalog/product/view.css')
            ->addCss('1columnMain.css');
    }


    public function viewAction(){
        $layout = $this->getLayout();
        $this->getCss();

        $child = $layout->getChild('content');
        $viewProduct = $layout->createBlock('catalog/product_view');
        $child->addChild('viewProduct', $viewProduct);

        $layout->toHtml();
    }

}
