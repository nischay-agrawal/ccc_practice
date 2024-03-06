<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{

    public function getCss()
    {
        $layout = $this->getLayout();

        $layout->getChild('head')->addCss('header.css');
        $layout->getChild('head')->addCss('footer.css');
        $layout->getChild('head')->addCss('1columnMain.css');
    }

    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->getCss();
        $banner = $layout->createBlock('core/template')
            ->setTemplate('banner/banner.phtml');
        $content = $layout->getChild('content')
            ->addChild('banner', $banner)
            ->addChild('banner1', $banner);

        $layout->toHtml();
    }

    public function saveAction()
    {
        $leyout = $this->getLayout()->toHtml();
    }

}
