<?php

class Admin_Controller_Banner extends Core_Controller_Admin_Action
{

    protected $_allowedAction = [];

    public function getCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('admin/header.css')
            // ->addCss('product/form.css')
            ->addCss('banner/list.css')
            ->addCss('adminMain.css');
    }


    public function formAction()
    {  
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $bannerForm = $layout->createBlock('banner/form');
        $child->addChild('form',$bannerForm);
        $layout->toHtml();      
    }

    public function saveAction(){
        $data = $this->getRequest()->getParams('banner');
        $fileName = $_FILES["banner"]["name"]['banner_image'];
        $uploadFile = Mage::getBaseDir('media/banner/') .$_FILES["banner"]["name"]['banner_image'] ;
        $data['banner_image'] = $fileName;

        move_uploaded_file($_FILES["banner"]["tmp_name"]['banner_image'], $uploadFile);
        $bannerModel = Mage::getModel('banner/banner');
        $bannerModel->setData($data);
        $bannerModel->save();
        $this->redirect('admin/banner/list');
    }

    public function listAction()
    {   
        $layout = $this->getLayout();
        $this->getCss();
        $child = $layout->getChild('content');
        $bannerList = $layout->createBlock('banner/list');
        $child->addChild('list',$bannerList);
        $layout->toHtml();      
                
    }


    public function deleteAction(){
        $id = $this->getRequest()->getParams('id');
        $banner = Mage::getModel('banner/banner')->load($id);
        $banner->delete();
        $this->redirect('admin/banner/list');
    }

}

