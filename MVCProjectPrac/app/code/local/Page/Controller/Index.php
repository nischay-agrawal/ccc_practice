<pre><?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        // echo "Index Action";
        // echo dirname(__FILE__);
        $layout = $this->getLayout();
        // $layout->getChild('head');
        $layout->getChild('head')->addJs('js/navigation.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/navigation.css');
        $layout->getChild('head')->addCss('css/page.css');
        // print_r($layout->getChild('head'));    
        $banner = $layout->createBlock('core/template')
            ->setTemplate('banner/banner.phtml');
        // echo get_class($banner);
        $layout->getChild('content')
            ->addChild('banner', $banner)
            ->addChild('banner1', $banner);

        $layout->toHtml();
    }
}
?>