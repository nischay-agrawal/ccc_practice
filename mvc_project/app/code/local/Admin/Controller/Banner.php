<?php

class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    protected $_allowedActions = [];
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('content')
            ->addChild('bannerForm', Mage::getBlock('banner/form'));
        $layout->toHtml();
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $banner = Mage::getModel('banner/banner');
        $bannerList = Mage::getBlock('banner/list');
        $bannerList->addData('banners', $banner->getCollection()->getData());
        $layout->getChild('content')->addChild('bannerList', $bannerList);
        $layout->toHtml();
    }

    public function saveAction()
    {
        $bannerData = $this->getRequest()->getPostData('banner');
        if ($_FILES['banner_image']['error'] == 0)
            $bannerData['banner_image'] = Mage::uploadFile($_FILES['banner_image'], 'banner/');
        Mage::getModel('banner/banner')->setData($bannerData)->save();
        $this->setRedirect('admin/banner/list');
    }
    public function deleteAction()
    {
        $bannerId = $this->getRequest()->getParams('id');
        Mage::getModel('banner/banner')->setId($bannerId)->delete();
        $this->setRedirect('admin/banner/list');
    }
}