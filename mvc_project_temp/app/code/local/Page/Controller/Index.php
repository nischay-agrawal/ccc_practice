<?php


class Page_Controller_Index extends Core_Controller_Front_Action
{

    public function getCss()
    {
        $layout = $this->getLayout();

        $layout->getChild('head')->addCss('header.css');
        $layout->getChild('head')->addCss('footer.css');
        $layout->getChild('head')->addCss('1columnMain.css');
        $layout->getChild('head')->addCss('banner/banner.css');
    }

    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $banner = $layout->createBlock('banner/banner');
        $content = $layout->getChild('content')
            ->addChild('banner', $banner);
        $layout->toHtml();
    }

}
